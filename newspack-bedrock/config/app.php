<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, detailed error pages are shown by Acorn's exception
    | handler. Disable in production.
    |
    */

    'debug' => defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_DISPLAY') && WP_DEBUG_DISPLAY,

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    */

    'name' => defined('WP_HOME') ? parse_url(WP_HOME, PHP_URL_HOST) : 'Newspack Bedrock',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        // Add custom service providers here.
    ],

];
