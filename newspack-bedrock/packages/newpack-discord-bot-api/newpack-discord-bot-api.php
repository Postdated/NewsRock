<?php
/**
 * Plugin Name: Newpack Discord Bot API
 * Description: Exposes a REST API for the Discord polling bot to query rolling coverage, newsletters, and events.
 * Version: 1.0.0
 * Requires PHP: 8.3
 * Requires at least: 6.5
 * Author: Newsroom
 *
 * @package Newpack_Discord_Bot
 */

namespace Newpack_Discord_Bot;

defined( 'ABSPATH' ) || exit;

class API {

    const REST_NAMESPACE = 'newspack-discord-bot/v1';
    const API_KEY_OPTION = 'newpack_discord_bot_api_key';

    public static function init() {
        add_action( 'rest_api_init', [ __CLASS__, 'register_routes' ] );
        add_action( 'admin_menu', [ __CLASS__, 'add_admin_page' ] );
    }

    /**
     * Register REST routes.
     */
    public static function register_routes() {
        // Coverage entries
        register_rest_route(
            self::REST_NAMESPACE,
            '/entries',
            [
                'methods'             => 'GET',
                'callback'            => [ __CLASS__, 'get_entries' ],
                'permission_callback' => [ __CLASS__, 'check_api_key' ],
                'args'                => [
                    'since' => [
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',
                        'default'           => '',
                    ],
                    'limit' => [
                        'type'    => 'integer',
                        'default' => 50,
                        'minimum' => 1,
                        'maximum' => 100,
                    ],
                ],
            ]
        );

        // Newsletter publishes
        register_rest_route(
            self::REST_NAMESPACE,
            '/newsletters',
            [
                'methods'             => 'GET',
                'callback'            => [ __CLASS__, 'get_newsletters' ],
                'permission_callback' => [ __CLASS__, 'check_api_key' ],
                'args'                => [
                    'since' => [
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',
                        'default'           => '',
                    ],
                    'limit' => [
                        'type'    => 'integer',
                        'default' => 20,
                        'minimum' => 1,
                        'maximum' => 50,
                    ],
                ],
            ]
        );

        // Content events (posts published, updated, gated)
        register_rest_route(
            self::REST_NAMESPACE,
            '/events',
            [
                'methods'             => 'GET',
                'callback'            => [ __CLASS__, 'get_events' ],
                'permission_callback' => [ __CLASS__, 'check_api_key' ],
                'args'                => [
                    'since' => [
                        'type'              => 'string',
                        'sanitize_callback' => 'sanitize_text_field',
                        'default'           => '',
                    ],
                    'limit' => [
                        'type'    => 'integer',
                        'default' => 50,
                        'minimum' => 1,
                        'maximum' => 100,
                    ],
                ],
            ]
        );

        // Health check
        register_rest_route(
            self::REST_NAMESPACE,
            '/health',
            [
                'methods'             => 'GET',
                'callback'            => [ __CLASS__, 'health_check' ],
                'permission_callback' => '__return_true',
            ]
        );
    }

    /**
     * Check API key authentication.
     */
    public static function check_api_key() {
        $stored_key = get_option( self::API_KEY_OPTION, '' );
        if ( empty( $stored_key ) ) {
            return new \WP_Error( 'not_configured', 'API key not set.', [ 'status' => 503 ] );
        }
        $provided_key = $_SERVER['HTTP_X_API_KEY'] ?? '';
        if ( ! hash_equals( $stored_key, $provided_key ) ) {
            return new \WP_Error( 'unauthorized', 'Invalid API key.', [ 'status' => 401 ] );
        }
        return true;
    }

    /**
     * Get rolling coverage entries.
     */
    public static function get_entries( $request ) {
        $since = $request->get_param( 'since' );
        $limit = $request->get_param( 'limit' ) ?: 50;

        $cache_key = "discord_bot_entries_{$since}_{$limit}";
        return rest_ensure_response( \Illuminate\Support\Facades\Cache::remember( $cache_key, 60, function () use ( $since, $limit ) {
            $query = \App\Models\Post::with(['author', 'terms', 'meta'])
                ->published()
                ->ofType('np_coverage_entry')
                ->orderBy('post_date', 'desc')
                ->limit($limit);

            if ( ! empty( $since ) ) {
                $query->where('post_date', '>', $since);
            }

            $posts = $query->get();
            $entries = $posts->map(function ($post) {
                $term = $post->terms->firstWhere('taxonomy', 'np_coverage');
                $source_meta = $post->meta->firstWhere('meta_key', '_np_source');

                return [
                    'id'             => $post->ID,
                    'title'          => html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' ),
                    'content'        => wp_trim_words( wp_strip_all_tags( $post->post_content ), 80 ),
                    'link'           => get_permalink( $post->ID ),
                    'date'           => date('c', strtotime($post->post_date)),
                    'modified'       => date('c', strtotime($post->post_modified)),
                    'coverage_name'  => $term ? $term->name : 'General',
                    'author'         => $post->author ? $post->author->display_name : 'Unknown',
                    'source'         => $source_meta ? $source_meta->meta_value : 'Staff',
                ];
            });

            return [
                'entries' => $entries,
                'total'   => $posts->count(), // or a separate count query if needed
            ];
        } ) );
    }

    /**
     * Get published newsletters.
     */
    public static function get_newsletters( $request ) {
        $since = $request->get_param( 'since' );
        $limit = $request->get_param( 'limit' ) ?: 20;

        $cache_key = "discord_bot_newsletters_{$since}_{$limit}";
        return rest_ensure_response( \Illuminate\Support\Facades\Cache::remember( $cache_key, 300, function () use ( $since, $limit ) {
            $query = \App\Models\Post::with('meta')
                ->whereIn('post_status', ['publish', 'private'])
                ->ofType('newspack_nl_cpt')
                ->orderBy('post_date', 'desc')
                ->limit($limit);

            if ( ! empty( $since ) ) {
                $query->where('post_date', '>', $since);
            }

            $posts = $query->get();
            $newsletters = [];

            foreach ( $posts as $post ) {
                $sent_meta = $post->meta->firstWhere('meta_key', 'newspack_newsletters_sent');
                if ( ! $sent_meta || ! $sent_meta->meta_value ) {
                    continue;
                }

                $count_meta = $post->meta->firstWhere('meta_key', 'newspack_newsletters_subscriber_count');
                $list_meta = $post->meta->firstWhere('meta_key', 'newspack_newsletters_list_name');

                $newsletters[] = [
                    'id'               => $post->ID,
                    'title'            => html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' ),
                    'excerpt'          => wp_trim_words( wp_strip_all_tags( $post->post_content ), 40 ),
                    'link'             => get_permalink( $post->ID ),
                    'date'             => date('c', strtotime($post->post_date)),
                    'subscriber_count' => $count_meta ? $count_meta->meta_value : 'N/A',
                    'list_name'        => $list_meta ? $list_meta->meta_value : 'All',
                ];
            }

            return [
                'newsletters' => $newsletters,
                'total'       => count($newsletters),
            ];
        } ) );
    }

    /**
     * Get content events (post publishes, updates).
     */
    public static function get_events( $request ) {
        $since = $request->get_param( 'since' );
        $limit = $request->get_param( 'limit' ) ?: 50;

        $cache_key = "discord_bot_events_{$since}_{$limit}";
        return rest_ensure_response( \Illuminate\Support\Facades\Cache::remember( $cache_key, 60, function () use ( $since, $limit ) {
            $query = \App\Models\Post::with('author')
                ->published()
                ->ofType('post')
                ->orderBy('post_modified', 'desc')
                ->limit($limit);

            if ( ! empty( $since ) ) {
                $query->where('post_modified', '>', $since);
            }

            $posts = $query->get();
            $events = $posts->map(function ($post) {
                $date_created = date('c', strtotime($post->post_date));
                $date_modified = date('c', strtotime($post->post_modified));
                $is_new = ( $date_created === $date_modified );

                return [
                    'id'          => $post->ID,
                    'title'       => html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' ),
                    'description' => wp_trim_words( wp_strip_all_tags( $post->post_content ), 40 ),
                    'link'        => get_permalink( $post->ID ),
                    'date'        => $date_modified,
                    'event_type'  => $is_new ? 'Published' : 'Updated',
                    'author'      => $post->author ? $post->author->display_name : 'Unknown',
                ];
            });

            return [
                'events' => $events,
                'total'  => $posts->count(),
            ];
        } ) );
    }

    /**
     * Health check endpoint.
     */
    public static function health_check() {
        return rest_ensure_response( [
            'status'    => 'ok',
            'site'      => get_bloginfo( 'name' ),
            'timestamp' => current_time( 'c' ),
        ] );
    }

    /**
     * Admin settings page.
     */
    public static function add_admin_page() {
        add_options_page(
            'Discord Bot API',
            'Discord Bot API',
            'manage_options',
            'newpack-discord-bot',
            [ __CLASS__, 'render_admin_page' ]
        );
    }

    /**
     * Render admin settings page.
     */
    public static function render_admin_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( isset( $_POST['newpack_discord_bot_save'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'newpack_discord_bot_save' ) ) {
            update_option( self::API_KEY_OPTION, sanitize_text_field( $_POST['api_key'] ) );
            echo '<div class="notice notice-success"><p>Settings saved.</p></div>';
        }

        $api_key = get_option( self::API_KEY_OPTION, '' );
        ?>
        <div class="wrap">
            <h1>Discord Bot API Settings</h1>
            <form method="post">
                <?php wp_nonce_field( 'newpack_discord_bot_save' ); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="api_key">API Key</label></th>
                        <td>
                            <input type="text" id="api_key" name="api_key" value="<?php echo esc_attr( $api_key ); ?>" class="regular-text" />
                            <p class="description">This key is used by the Discord bot to authenticate API requests. Generate a random string.</p>
                            <button type="button" class="button" onclick="document.getElementById('api_key').value = Array.from(crypto.getRandomValues(new Uint8Array(32)), b => b.toString(16).padStart(2,'0')).join('')">Generate</button>
                        </td>
                    </tr>
                </table>
                <p><strong>API Endpoints:</strong></p>
                <code><?php echo esc_html( rest_url( self::REST_NAMESPACE ) ); ?>/entries?since=...</code><br>
                <code><?php echo esc_html( rest_url( self::REST_NAMESPACE ) ); ?>/newsletters?since=...</code><br>
                <code><?php echo esc_html( rest_url( self::REST_NAMESPACE ) ); ?>/events?since=...</code><br>
                <code><?php echo esc_html( rest_url( self::REST_NAMESPACE ) ); ?>/health</code>
                <?php submit_button( 'Save Settings', 'primary', 'newpack_discord_bot_save' ); ?>
            </form>
        </div>
        <?php
    }
}

API::init();

