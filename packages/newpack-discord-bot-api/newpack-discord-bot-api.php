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
        $limit = $request->get_param( 'limit' );

        // Query rolling coverage post type
        $args = [
            'post_type'      => 'np_coverage_entry',
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if ( ! empty( $since ) ) {
            $args['date_query'] = [
                [
                    'after'     => $since,
                    'inclusive' => false,
                ],
            ];
        }

        $query = new \WP_Query( $args );
        $entries = [];

        foreach ( $query->posts as $post ) {
            $coverage_terms = get_the_terms( $post, 'np_coverage' );
            $coverage_name = $coverage_terms && ! is_wp_error( $coverage_terms )
                ? $coverage_terms[0]->name
                : 'General';

            $author = get_userdata( $post->post_author );

            $entries[] = [
                'id'             => $post->ID,
                'title'          => html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ),
                'content'        => wp_trim_words( wp_strip_all_tags( $post->post_content ), 80 ),
                'link'           => get_permalink( $post ),
                'date'           => get_the_date( 'c', $post ),
                'modified'       => get_the_modified_date( 'c', $post ),
                'coverage_name'  => $coverage_name,
                'author'         => $author ? $author->display_name : 'Unknown',
                'source'         => get_post_meta( $post->ID, '_np_source', true ) ?: 'Staff',
            ];
        }

        return rest_ensure_response( [
            'entries' => $entries,
            'total'   => $query->found_posts,
        ] );
    }

    /**
     * Get published newsletters.
     */
    public static function get_newsletters( $request ) {
        $since = $request->get_param( 'since' );
        $limit = $request->get_param( 'limit' );

        $args = [
            'post_type'      => 'newspack_nl_cpt',
            'posts_per_page' => $limit,
            'post_status'    => [ 'publish', 'private' ],
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if ( ! empty( $since ) ) {
            $args['date_query'] = [
                [
                    'after'     => $since,
                    'inclusive' => false,
                ],
            ];
        }

        $query = new \WP_Query( $args );
        $newsletters = [];

        foreach ( $query->posts as $post ) {
            $sent = get_post_meta( $post->ID, 'newspack_newsletters_sent', true );
            if ( ! $sent ) {
                continue; // Only report actually sent newsletters.
            }

            $newsletters[] = [
                'id'               => $post->ID,
                'title'            => html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ),
                'excerpt'          => wp_trim_words( wp_strip_all_tags( $post->post_content ), 40 ),
                'link'             => get_permalink( $post ),
                'date'             => get_the_date( 'c', $post ),
                'subscriber_count' => get_post_meta( $post->ID, 'newspack_newsletters_subscriber_count', true ) ?: 'N/A',
                'list_name'        => get_post_meta( $post->ID, 'newspack_newsletters_list_name', true ) ?: 'All',
            ];
        }

        return rest_ensure_response( [
            'newsletters' => $newsletters,
            'total'       => $query->found_posts,
        ] );
    }

    /**
     * Get content events (post publishes, updates).
     */
    public static function get_events( $request ) {
        $since = $request->get_param( 'since' );
        $limit = $request->get_param( 'limit' );

        $args = [
            'post_type'      => 'post',
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
            'orderby'        => 'modified',
            'order'          => 'DESC',
        ];

        if ( ! empty( $since ) ) {
            $args['date_query'] = [
                [
                    'column'    => 'post_modified',
                    'after'     => $since,
                    'inclusive' => false,
                ],
            ];
        }

        $query = new \WP_Query( $args );
        $events = [];

        foreach ( $query->posts as $post ) {
            $is_new = ( get_the_date( 'c', $post ) === get_the_modified_date( 'c', $post ) );

            $events[] = [
                'id'          => $post->ID,
                'title'       => html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ),
                'description' => wp_trim_words( wp_strip_all_tags( $post->post_content ), 40 ),
                'link'        => get_permalink( $post ),
                'date'        => get_the_modified_date( 'c', $post ),
                'event_type'  => $is_new ? 'Published' : 'Updated',
                'author'      => get_the_author_meta( 'display_name', $post->post_author ),
            ];
        }

        return rest_ensure_response( [
            'events' => $events,
            'total'  => $query->found_posts,
        ] );
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

