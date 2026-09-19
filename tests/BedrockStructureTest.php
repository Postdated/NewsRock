<?php

test('bedrock required files exist', function () {
    $root = dirname(__DIR__);
    expect(file_exists($root . '/web/wp-config.php'))->toBeTrue();
    expect(file_exists($root . '/web/index.php'))->toBeTrue();
    expect(file_exists($root . '/config/application.php'))->toBeTrue();
    expect(file_exists($root . '/config/environments/development.php'))->toBeTrue();
    expect(file_exists($root . '/.env.example'))->toBeTrue();
    expect(file_exists($root . '/web/app/object-cache.php'))->toBeTrue();
    expect(file_exists($root . '/web/app/mu-plugins/acorn-bootloader.php'))->toBeTrue();
    expect(file_exists($root . '/web/app/mu-plugins/bedrock-autoloader.php'))->toBeTrue();
});

test('composer uses wp-packages, php 8.3, acorn, and plugin path repos', function () {
    $composer = json_decode(file_get_contents(dirname(__DIR__) . '/composer.json'), true);
    expect($composer['require']['php'])->toBe('>=8.3');
    expect($composer['extra']['wordpress-install-dir'])->toBe('web/wp');
    $urls = array_column($composer['repositories'], 'url');
    expect($urls)->toContain('https://repo.wp-packages.org');
    expect($composer['require'])->toHaveKey('roots/wordpress');
    expect($composer['require'])->toHaveKey('roots/acorn');
    expect($composer['require'])->toHaveKey('roots/bedrock-autoloader');
});

test('custom plugins are wordpress-plugin composer packages under web/app/plugins', function () {
    foreach ([
        'newsroom-speed-cache',
        'newspack-local-esps',
        'newsroom-image-downloader',
        'newpack-discord-bot-api',
    ] as $plugin) {
        $dir = dirname(__DIR__) . '/web/app/plugins/' . $plugin;
        expect(file_exists($dir . '/composer.json'))->toBeTrue();
        $json = json_decode(file_get_contents($dir . '/composer.json'), true);
        expect($json['type'])->toBe('wordpress-plugin');
        expect($json['require']['php'])->toBe('>=8.3');
    }
});

test('env example is memcached-only', function () {
    $env = file_get_contents(dirname(__DIR__) . '/.env.example');
    expect($env)->toContain('MEMCACHED_HOST');
    expect($env)->toContain('WP_SITEURL');
    expect($env)->not->toContain('REDIS_HOST');
});

test('wp-config does not bootstrap wordpress itself besides requiring application.php', function () {
    $src = file_get_contents(dirname(__DIR__) . '/web/wp-config.php');
    expect($src)->toContain("dirname(__DIR__) . '/vendor/autoload.php'");
    expect($src)->toContain("dirname(__DIR__) . '/config/application.php'");
    expect($src)->toContain('wp-settings.php');
});
