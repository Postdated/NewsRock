<?php
/**
 * NewsWoo Service Provider.
 *
 * Registers Eloquent models, services, and the WooCommerce bridge.
 * Boots via Acorn's service provider system.
 *
 * @package NewsWoo
 */

namespace NewsWoo;

use Illuminate\Support\ServiceProvider;
use NewsWoo\Services\WooCommerceBridge;

class NewsWooServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind services as singletons.
        $this->app->singleton(Services\SubscriptionService::class);
        $this->app->singleton(Services\PaywallService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Initialize the WooCommerce compatibility bridge.
        WooCommerceBridge::init();

        // Register REST API routes.
        $this->registerRestRoutes();
    }

    /**
     * Register NewsWoo REST API endpoints.
     * These supplement (not replace) WooCommerce's REST API.
     */
    protected function registerRestRoutes(): void
    {
        add_action('rest_api_init', function () {
            // Subscription analytics.
            register_rest_route('newspack-woo/v1', '/stats/mrr', [
                'methods' => 'GET',
                'callback' => [Services\SubscriptionService::class, 'mrr'],
                'permission_callback' => function () {
                    return current_user_can('manage_options');
                },
            ]);

            register_rest_route('newspack-woo/v1', '/stats/churn', [
                'methods' => 'GET',
                'callback' => [Services\SubscriptionService::class, 'churnRate'],
                'permission_callback' => function () {
                    return current_user_can('manage_options');
                },
            ]);

            register_rest_route('newspack-woo/v1', '/stats/subscribers', [
                'methods' => 'GET',
                'callback' => [Services\SubscriptionService::class, 'countByStatus'],
                'permission_callback' => function () {
                    return current_user_can('manage_options');
                },
            ]);

            // Content access check.
            register_rest_route('newspack-woo/v1', '/access/(?P<post_id>\d+)', [
                'methods' => 'GET',
                'callback' => function (\WP_REST_Request $request) {
                    $userId = get_current_user_id();
                    $postId = $request->get_param('post_id');
                    return [
                        'can_access' => Services\PaywallService::canAccess($userId, $postId),
                        'is_gated' => Services\PaywallService::isGated($postId),
                        'tier' => Services\PaywallService::tierLabel($postId),
                    ];
                },
                'permission_callback' => '__return_true',
            ]);

            // User subscription summary.
            register_rest_route('newspack-woo/v1', '/user/summary', [
                'methods' => 'GET',
                'callback' => function () {
                    $userId = get_current_user_id();
                    if (!$userId) {
                        return new \WP_Error('not_logged_in', 'Not logged in', ['status' => 401]);
                    }
                    return [
                        'is_subscriber' => Services\SubscriptionService::isActive($userId),
                        'subscriptions' => Services\SubscriptionService::forUser($userId),
                        'access' => Services\PaywallService::userAccessSummary($userId),
                        'ltv' => Services\SubscriptionService::lifetimeValue($userId),
                    ];
                },
                'permission_callback' => '__return_true',
            ]);
        });
    }
}

