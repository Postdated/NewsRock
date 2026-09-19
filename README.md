# NewsRock

Monorepo for the Postdated newsroom stack:

| Folder | Product |
| --- | --- |
| [`newspack-bedrock/`](newspack-bedrock/) | Newspack on [Roots Bedrock](https://roots.io/bedrock/) + Acorn |
| [`newswoo/`](newswoo/) | NewsWoo, the Newspack-oriented WooCommerce fork |
| [`newsdesk/`](newsdesk/) | NewsDesk, the Newspack theme for Bedrock and Sage |

This is the canonical repo. The older [Postdated/Newspack](https://github.com/Postdated/Newspack) tree now lives in `newspack-bedrock/`.

## Layout

```
NewsRock/
  newspack-bedrock/   Bedrock WordPress site, Composer plugins, Memcached
  newswoo/            WooCommerce fork (in progress)
  newsdesk/           Sage/Bedrock theme (in progress)
```

Each product keeps its own `composer.json` (or theme toolchain). Install from the product folder, not the repo root.

## Newspack Bedrock

```bash
git clone https://github.com/Postdated/NewsRock.git
cd NewsRock/newspack-bedrock
cp .env.example .env
composer install
```

Web root is `newspack-bedrock/web/`. Plugin sources are in `newspack-bedrock/packages/` and install into `web/app/plugins/` via Composer.

Release zips: [Newspack Bedrock v1.1.0](https://github.com/Postdated/NewsRock/releases/tag/newspack-bedrock-v1.1.0)

## License

GPL-2.0-or-later for WordPress plugins and this newsroom stack. Roots Bedrock/Acorn are MIT.
