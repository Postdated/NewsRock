# Newspack Bedrock v1.0.0

A local-first newsroom on [Roots Bedrock](https://roots.io/bedrock/) with [Acorn](https://roots.io/acorn/) (Laravel in WordPress). WordPress core is installed with [WP Packages](https://wp-packages.org/wordpress-core) (`roots/wordpress`) into `web/wp/`. Plugins live in `web/app/plugins/`. Object cache is Memcached (Trellis default). Redis is not used.

Adapted from [Automattic/newspack-workspace](https://github.com/Automattic/newspack-workspace). Layout matches [roots/bedrock](https://github.com/roots/bedrock).

## Roots docs this repo follows

- [Bedrock installation](https://roots.io/bedrock/docs/installation/)
- [Composer](https://roots.io/bedrock/docs/composer/)
- [Environment variables](https://roots.io/bedrock/docs/environment-variables/)
- [Folder structure](https://roots.io/bedrock/docs/folder-structure/)
- [Server configuration](https://roots.io/bedrock/docs/server-configuration/)
- [Local development](https://roots.io/bedrock/docs/local-development/)
- [Testing](https://roots.io/bedrock/docs/testing/)
- [MU-plugin autoloader](https://roots.io/bedrock/docs/mu-plugin-autoloader/)
- [WP-Cron](https://roots.io/bedrock/docs/wp-cron/)
- [Private plugins as Composer dependencies](https://roots.io/bedrock/docs/private-or-commercial-wordpress-plugins-as-composer-dependencies/)
- [Patching plugins with Composer](https://roots.io/bedrock/docs/patching-wordpress-plugins-with-composer/)
- [Acorn installation](https://roots.io/acorn/docs/installation/)
- [WP Packages WordPress core](https://wp-packages.org/wordpress-core)

## Folder structure

Official Bedrock: `composer.json`, `config/application.php`, `config/environments/`, `web/wp-config.php` (do not edit), `web/index.php`, `web/wp/` (core), `web/app/plugins/`, `web/app/mu-plugins/`, `web/app/themes/`, `web/app/uploads/`, `web/app/object-cache.php` (Memcached).

## Install

```bash
git clone https://github.com/Postdated/Newspack.git
cd Newspack
cp .env.example .env
composer install
```

Web root is `web/`. Admin is at `/wp/wp-admin`. Set MariaDB credentials and `MEMCACHED_HOST` in `.env`. Generate salts at https://roots.io/salts.html

## Laravel / Acorn

`roots/acorn` is required. `web/app/mu-plugins/acorn-bootloader.php` boots Acorn on `after_setup_theme`. Plugin CSS/JS must use `wp_enqueue_*` and `plugin_dir_url()` so assets resolve under `/app/` not `/wp-content/`.

## Packaging

Package name: Newspack Bedrock. Tag: `newspack-bedrock-vMAJOR.MINOR.PATCH`.

## License

GPL-2.0-or-later. Newspack: Automattic. Bedrock/Acorn: Roots MIT. Custom plugins: Postdated GPL-2.0-or-later.
