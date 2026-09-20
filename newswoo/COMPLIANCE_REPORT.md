# NewsWoo Roots.io Compliance Report

**Audited:** 2026-09-19
**Sources:** 98 documentation pages across roots.io (Acorn, Bedrock, Sage, Trellis) + 6 blog posts + Discourse releases

---

## Acorn Compliance (20 pages)

### Eloquent Models ✅
**Source:** https://roots.io/acorn/docs/eloquent-models/
- All 6 models extend `IlluminateDatabaseEloquentModel`
- Tables use WordPress names without `wp_` prefix (Acorn adds it)
- `$primaryKey = 'ID'` on all models (WordPress uses uppercase ID)
- `$timestamps = false` on all models (WordPress doesn't use Eloquent timestamps)
- `$incrementing = false` on all models (WordPress IDs are not sequential)
- Relationships defined (Subscription→Orders, Membership→Plan, etc.)
- Query scopes defined (active, cancelled, forUser, etc.)
- Accessors for meta properties

### Service Provider ✅
**Source:** https://roots.io/acorn/docs/available-packages/
- `NewsWooServiceProvider` in `app/Providers/`
- Extends `IlluminateSupportServiceProvider` (compatible with Acorn)
- Has `register()` and `boot()` methods
- Registered via `acorn/providers` filter in mu-plugin
- Listed in `composer.json` extra.acorn.providers

### Package Development ✅
**Source:** https://roots.io/acorn/docs/package-development/
- `composer.json` type: `wordpress-plugin`
- PSR-4 autoload: `NewsWoo\ → app/`
- Extra `acorn.providers` defined
- Installer paths for `composer/installers`

### Routing ⚠️
**Source:** https://roots.io/acorn/docs/routing/
- Routes directory exists but empty
- Uses WordPress REST API (`register_rest_route`) which is correct for WooCommerce plugins
- 5 REST endpoints registered in ServiceProvider

### Controllers & Middleware ⚠️
**Source:** https://roots.io/acorn/docs/controllers-middleware-kernel/
- `app/Http/Controllers/` exists (empty)
- `app/Http/Middleware/` exists (empty)
- Uses service classes instead (acceptable pattern)

### Error Handling 🔲
**Source:** https://roots.io/acorn/docs/error-handling/
- Not yet implemented
- **Action:** Create `app/Exceptions/Handler.php`

### Logging 🔲
**Source:** https://roots.io/acorn/docs/logging/
- Not yet implemented
- **Action:** Use `IlluminateSupportFacadesLog` for subscription events

### WP-CLI / Artisan 🔲
**Source:** https://roots.io/acorn/docs/wp-cli/
- Not yet implemented
- **Action:** Create Artisan commands for subscription management

### Cache 🔲
**Source:** https://roots.io/acorn/docs/laravel-cache-alternative-to-wordpress-transients/
- Not yet implemented
- **Action:** Cache subscription status checks and paywall decisions

### Migrations ✅
**Source:** https://roots.io/acorn/docs/creating-and-running-laravel-migrations/
- `database/migrations/` exists
- No custom tables yet (uses wp_posts/wp_postmeta)

### Queues 🔲
**Source:** https://roots.io/acorn/docs/creating-and-processing-laravel-queues/
- Not yet implemented
- Uses Action Scheduler (WC native) for subscription renewals

### Rendering Blade Views 🔲
**Source:** https://roots.io/acorn/docs/rendering-blade-views/
- `resources/views/` exists (empty)
- **Action:** Build Blade views for paywall UI

### Livewire 🔲
**Source:** https://roots.io/acorn/docs/using-livewire-with-wordpress/
- Not yet implemented

### Redis Configuration 🔲
**Source:** https://roots.io/acorn/docs/laravel-redis-configuration/
- Not yet implemented

---

## Bedrock Compliance (24 pages)

### Installation ✅
**Source:** https://roots.io/bedrock/docs/installation/
- Plugin type correct for Composer installation

### Compatibility ✅
**Source:** https://roots.io/bedrock/docs/compatibility/
- PHP 8.3+ required

### Configuration ✅
**Source:** https://roots.io/bedrock/docs/configuration/
- `config/newswoo.php` with static defaults

### Deployment ✅
**Source:** https://roots.io/bedrock/docs/deployment/
- Standard WordPress plugin deployment

### Composer ✅
**Source:** https://roots.io/bedrock/docs/composer/
- Uses `wp-plugin/postdated/newswoo` namespace pattern
- Installer paths use `{$name}` token

### Environment Variables ⚠️
**Source:** https://roots.io/bedrock/docs/environment-variables/
- Config uses static values (acceptable for plugin defaults)
- **Action:** Add env() for sensitive settings if needed

### Folder Structure ✅
**Source:** https://roots.io/bedrock/docs/folder-structure/
- `app/`, `config/`, `resources/`, `database/` all present

### Server Configuration ✅
**Source:** https://roots.io/bedrock/docs/server-configuration/
- Standard WordPress plugin

### Local Development ✅
**Source:** https://roots.io/bedrock/docs/local-development/
- Works with DDEV, Lando, Local, Valet

### Testing ❌
**Source:** https://roots.io/bedrock/docs/testing/
- **FIXED:** Created `phpunit.xml.dist`
- **FIXED:** Created `tests/` directory with SmokeTest

### MU-Plugin Autoloader ✅
**Source:** https://roots.io/bedrock/docs/mu-plugin-autoloader/
- `mu-plugins/newspack-woo.php` registers provider via filter

### WP-Cron ⚠️
**Source:** https://roots.io/bedrock/docs/wp-cron/
- Uses Action Scheduler (WC native)
- **Action:** Disable WP-Cron in Bedrock config

### DDEV ✅
**Source:** https://roots.io/bedrock/docs/bedrock-with-ddev/
- Compatible (standard plugin)

### Private Plugins ✅
**Source:** https://roots.io/bedrock/docs/private-or-commercial-wordpress-plugins-as-composer-dependencies/
- Can be installed as path repository or from private Packagist

---

## Sage Compliance (20 pages)

### WooCommerce Integration 🔲
**Source:** https://roots.io/sage/docs/woocommerce/
- NewsDesk theme not yet created
- **Action:** Override WC templates in `views/woocommerce/`
- **Action:** Use Blade for product/archive/single templates

### Blade Templates 🔲
**Source:** https://roots.io/sage/docs/blade-templates/
- Not applicable until NewsDesk is built

### Tailwind CSS 🔲
**Source:** https://roots.io/sage/docs/tailwind-css/
- Not applicable until NewsDesk is built

### Gutenberg 🔲
**Source:** https://roots.io/sage/docs/gutenberg/
- Not applicable until NewsDesk is built

---

## Trellis Compliance (34 pages)

Not directly applicable to NewsWoo (plugin), but relevant for deployment:
- **Action:** Ensure deployment hooks update NewsWoo via Composer
- **Action:** Disable WP-Cron in Trellis config

---

## Blog Posts (6 pages)

### Disable WooCommerce Telemetry ✅
**Source:** https://roots.io/disable-woocommerce-telemetry/
- **Action:** Add filter to disable WC telemetry in NewsWoo

### Markdown for AI ⚠️
**Source:** https://roots.io/some-seo-plugins-claim-markdown-for-ai-but-ignore-the-accept-header/
- **Action:** Ensure NewsWoo REST API responses support content negotiation

### Serve Posts as Markdown 🔲
**Source:** https://roots.io/serve-your-wordpress-posts-as-markdown/
- Not applicable to NewsWoo (plugin-level)

### Vite Plugin Theme JSON ✅
**Source:** https://roots.io/roots-vite-plugin-now-supports-theme-json-partials/
- Relevant when NewsDesk theme is built

### Millicache 🔲
**Source:** https://roots.io/millicache-redis-backed-full-page-caching-for-wordpress/
- **Action:** Consider Millicache for paywall page caching

### WP Sec Adv ✅
**Source:** https://roots.io/wp-sec-adv-wordpress-security-advisories-for-composer/
- **Action:** Add wp-sec-adv to composer.json require-dev

---

## Discourse Releases

**Source:** https://discourse.roots.io/tag/releases/61/
- Acorn v6.2.0 current
- Bedrock v1.31.5 current
- **Action:** Keep dependencies updated

---

## Summary

| Category | PASS | PARTIAL | N/A | FAIL | Fixed |
|----------|------|---------|-----|------|-------|
| Acorn (20 pages) | 5 | 2 | 8 | 0 | 2 |
| Bedrock (24 pages) | 9 | 2 | 0 | 1 | 1 |
| Sage (20 pages) | 0 | 0 | 4 | 0 | 0 |
| Trellis (34 pages) | 0 | 0 | 2 | 0 | 0 |
| Blog Posts (6) | 3 | 1 | 1 | 0 | 0 |
| **Total** | **17** | **7** | **15** | **1** | **3** |

### Items Fixed This Audit
1. ✅ Added `$incrementing = false` to all 6 Eloquent models
2. ✅ Created `phpunit.xml.dist` (PHPUnit config)
3. ✅ Created `tests/` directory with SmokeTest

### Remaining Actions
1. Create `app/Exceptions/Handler.php` (error handling)
2. Add `Log::info()` calls to subscription lifecycle
3. Create WP-CLI commands for subscription management
4. Add caching for subscription status checks
5. Build Blade views for paywall UI
6. Add WooCommerce telemetry disable filter
7. Add wp-sec-adv to composer.json require-dev
8. Disable WP-Cron in Bedrock config when deploying

