<?php

test('bedrock pack is a wordpress-muplugin composer package', function () {
    $json = json_decode(file_get_contents(dirname(__DIR__) . '/packages/newspack-bedrock-pack/composer.json'), true);
    expect($json['type'])->toBe('wordpress-muplugin');
    expect($json['require']['php'])->toBe('>=8.3');
    expect($json['extra']['installer-name'])->toBe('newspack-bedrock-pack');
});

test('prevent direct access is a wordpress-plugin composer package', function () {
    $json = json_decode(file_get_contents(dirname(__DIR__) . '/packages/prevent-direct-access/composer.json'), true);
    expect($json['type'])->toBe('wordpress-plugin');
    expect($json['version'])->toBe('2.8.9.1');
    expect($json['extra']['installer-name'])->toBe('prevent-direct-access');
    expect(file_exists(dirname(__DIR__) . '/packages/prevent-direct-access/prevent-direct-access.php'))->toBeTrue();
});

test('root composer requires the pack and prevent-direct-access', function () {
    $composer = json_decode(file_get_contents(dirname(__DIR__) . '/composer.json'), true);
    expect($composer['require'])->toHaveKey('postdated/newspack-bedrock-pack');
    expect($composer['require'])->toHaveKey('bwps/prevent-direct-access');
    expect($composer['extra']['installer-paths'])->toHaveKey('web/app/mu-plugins/{$name}/');
});

test('pack catalog lists prevent-direct-access as recommended', function () {
    $src = file_get_contents(dirname(__DIR__) . '/packages/newspack-bedrock-pack/src/class-catalog.php');
    expect($src)->toContain("'prevent-direct-access'");
    expect($src)->toContain("'newspack-blocks'");
});

test('pack admin uses plugin_dir_url for Sage/Bedrock assets', function () {
    $src = file_get_contents(dirname(__DIR__) . '/packages/newspack-bedrock-pack/src/class-admin.php');
    expect($src)->toContain('plugin_dir_url');
    expect($src)->not->toContain('WP_CONTENT_URL');
    expect($src)->toContain('newspack-bedrock-pack/v1/install');
});
