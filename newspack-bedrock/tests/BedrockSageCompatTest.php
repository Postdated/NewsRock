<?php

test('plugins use plugin_dir_url for Sage compatibility instead of WP_CONTENT_URL', function () {
    $root = dirname(__DIR__) . '/packages';
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
    $hardcoded_paths = [];

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            // Enforce Sage compatibility: Assets must be resolved dynamically, not hardcoded to /wp-content/
            if (strpos($content, 'WP_CONTENT_URL') !== false || strpos($content, '/wp-content/plugins') !== false) {
                // allowlist comments or specific valid uses if necessary
                if (!preg_match('/prevent-direct-access/', $file->getPathname())) {
                    $hardcoded_paths[] = $file->getPathname();
                }
            }
        }
    }
    expect($hardcoded_paths)->toBeEmpty('Hardcoded /wp-content/ paths break Sage/Bedrock. Use plugin_dir_url() instead.');
});

test('plugin packages are compatible with Roots Acorn and Laravel components', function () {
    $root = dirname(__DIR__) . '/packages';
    $composer_files = glob($root . '/*/composer.json');
    
    foreach ($composer_files as $file) {
        $json = json_decode(file_get_contents($file), true);
        
        // If a plugin explicitly requires database interaction or routing, it should be compatible with Illuminate/Eloquent
        if (isset($json['require']['illuminate/database']) || isset($json['require']['roots/acorn'])) {
            expect($json['require'])->toHaveKey('roots/acorn', 'Plugins using Laravel components must require roots/acorn');
        }
    }
    
    // Verify the Acorn bootloader exists
    expect(file_exists(dirname(__DIR__) . '/web/app/mu-plugins/acorn-bootloader.php'))->toBeTrue();
});
