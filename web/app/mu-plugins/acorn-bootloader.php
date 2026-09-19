<?php
/**
 * Plugin Name: Acorn Bootloader
 * Description: Boots Roots Acorn so Laravel components work inside this Bedrock site.
 * Author: Roots / Postdated
 * License: MIT
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', static function (): void {
    if (!function_exists('\Roots\bootloader')) {
        return;
    }
    try {
        \Roots\bootloader()->boot();
    } catch (\Throwable $e) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Acorn boot failed: ' . $e->getMessage());
        }
    }
});
