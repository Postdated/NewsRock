<?php
/**
 * Roots Bedrock configuration for Newspack Bedrock.
 *
 * @package Newspack_Bedrock
 */

use Roots\WPConfig\Config;

/**
 * Directory containing all site-specific application code.
 */
define('ROOT_DIR', dirname(__DIR__));
define('WEBROOT_DIR', ROOT_DIR . '/web');

/**
 * Use .env to set environment-specific configuration.
 */
Config::define('DB_NAME', env('DB_NAME'));
Config::define('DB_USER', env('DB_USER'));
Config::define('DB_PASSWORD', env('DB_PASSWORD'));
Config::define('DB_HOST', env('DB_HOST') ?: 'localhost');
Config::define('DB_CHARSET', 'utf8mb4');
Config::define('DB_COLLATE', '');

$table_prefix = env('DB_PREFIX') ?: 'wp_';

/**
 * Authentication unique keys and salts.
 */
Config::define('AUTH_KEY', env('AUTH_KEY'));
Config::define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
Config::define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
Config::define('NONCE_KEY', env('NONCE_KEY'));
Config::define('AUTH_SALT', env('AUTH_SALT'));
Config::define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
Config::define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
Config::define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Custom Newspack Bedrock settings.
 */
Config::define('WP_HOME', env('WP_HOME'));
Config::define('WP_SITEURL', env('WP_HOME') . '/wp');
Config::define('WP_CONTENT_DIR', WEBROOT_DIR . '/app');
Config::define('WP_CONTENT_URL', env('WP_HOME') . '/app');

/**
 * Memcached object cache settings.
 */
Config::define('MEMCACHED_SERVERS', [
    [
        'host' => env('MEMCACHED_HOST') ?: '127.0.0.1',
        'port' => (int) (env('MEMCACHED_PORT') ?: 11211),
        'weight' => 100,
    ],
]);

/**
 * Newspack Bedrock: force local processing.
 */
Config::define('NEWSPACK_LOCAL_MODE', true);

/**
 * Debugging settings.
 */
Config::define('WP_DEBUG_DISPLAY', false);
Config::define('WP_DEBUG_LOG', false);
Config::define('SCRIPT_DEBUG', false);

ini_set('display_errors', '0');

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', WEBROOT_DIR . '/wp/');
}

