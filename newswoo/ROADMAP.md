# NewsWoo Roadmap

A phased plan to transform WooCommerce into a lean, newsroom-focused publishing platform for [Newspack Bedrock](https://github.com/Postdated/Newspack).

---

## Phase 1: Foundation & Analysis ✅
**Goal:** Understand the codebase and establish the project structure.

- [x] Clone and catalog WooCommerce 11.1.1 core (800,537 LOC)
- [x] Analyze WooCommerce Subscriptions 9.2.0 (155,157 LOC)
- [x] Analyze WooCommerce Memberships 1.30.0 (146,424 LOC)
- [x] Analyze Name Your Price 3.8.2 (10,325 LOC)
- [x] Analyze Subscriptions Gifting 2.9.1 (7,092 LOC)
- [x] Map removable subsystems (shipping, inventory, coupons, tax, retail product types)
- [x] Audit Newspack's WooCommerce integration layer (12+ classes)
- [x] Map Newspack compatibility requirements (hooks, filters, class interfaces)
- [x] Create brand assets (logos, icon, font bundle)
- [x] Create project README and issue templates
- [x] Create code analysis report

## Phase 2: Core Stripping 🎯
**Goal:** Remove retail-only subsystems from WooCommerce core.

### 2A: Shipping Removal
- [ ] Remove `includes/shipping/` directory and all shipping calculators
- [ ] Strip shipping zone/class database tables from install schema
- [ ] Remove shipping address fields from checkout templates
- [ ] Remove shipping-related admin menu items and settings pages
- [ ] Clean up `WC_Cart` shipping methods and rate calculations
- [ ] Remove shipping meta from order objects
- **Impact:** ~12 files directly affected, cascading changes across cart/checkout

### 2B: Inventory Removal
- [ ] Remove stock management logic (`WC_Product` stock methods)
- [ ] Strip `manage_stock`, `stock_quantity`, `backorders` from product data stores
- [ ] Remove low-stock email notifications
- [ ] Remove inventory-related admin columns and meta boxes
- [ ] Clean up product data filters for stock status
- **Impact:** ~108 files reference stock/inventory systems

### 2C: Cart Simplification
- [ ] Remove the `[woocommerce_cart]` page entirely
- [ ] Redirect "Add to Cart" to direct checkout (skip cart)
- [ ] Strip AJAX cart fragment updates from header
- [ ] Simplify `WC_Cart` to a minimal payment-session holder
- [ ] Remove shipping calculator widget from cart
- **Impact:** ~96 files reference cart functionality

### 2D: Coupon Simplification
- [ ] Keep basic discount codes for promotional subscriptions
- [ ] Remove free-shipping coupons
- [ ] Remove product-specific combination exclusion logic
- [ ] Simplify coupon validation to percentage/fixed only
- **Impact:** ~69 files reference coupon systems

### 2E: Tax Simplification
- [ ] Remove geo-location-based shipping tax calculations
- [ ] Remove `WC_Geo_IP` and geolocation integration
- [ ] Simplify tax to billing-address / country-only
- [ ] Remove shipping tax rate types
- **Impact:** ~80 files reference tax/geolocation

### 2F: Retail Product Type Removal
- [ ] Remove `WC_Product_Grouped` and `WC_Product_External` classes
- [ ] Simplify `WC_Product_Variable` to basic tier selection
- [ ] Remove complex attribute/variation matrix UI
- [ ] Clean up product type selectors in admin
- **Impact:** ~79 files reference these product types

## Phase 3: Newspack Integration 🔌
**Goal:** Ensure NewsWoo is a seamless drop-in for Newspack Bedrock.

### 3A: Hook & Filter Compatibility
- [ ] Audit all `woocommerce_*` hooks that Newspack's `WooCommerce_Connection` uses
- [ ] Verify subscription status constants match Newspack's `ACTIVE_SUBSCRIPTION_STATUSES`
- [ ] Ensure order status hooks fire correctly for `Contact_Sync_Connector`
- [ ] Test `WooCommerce_Cover_Fees` integration
- [ ] Test `WooCommerce_Product_Validator` rules
- [ ] Verify `WooCommerce_Emails` custom receipt and cancellation emails work
- [ ] Ensure Stripe payment method saving works (`wc_stripe_save_to_subs_checked`)

### 3B: Modal Checkout Compatibility
- [ ] Verify `Modal_Checkout` from newspack-blocks works with NewsWoo
- [ ] Test donate block checkout flow
- [ ] Test checkout button block flow
- [ ] Verify coupon auto-application in modal
- [ ] Test gift subscription flow in modal
- [ ] Ensure rate limiting works on checkout

### 3C: Content Gating Compatibility
- [ ] Verify `Content_Gate` paywall renders correctly
- [ ] Test metering system with NewsWoo subscriptions
- [ ] Verify `Access_Rules` and `Access_Attribution` work
- [ ] Test premium newsletter gating
- [ ] Verify email verification prompt works with NewsWoo accounts

### 3D: Data Events & ESP Sync
- [ ] Verify `data-events/listeners.php` fires for NewsWoo orders
- [ ] Test `Memberships` data events class
- [ ] Verify `WooUser_Registration` data events
- [ ] Test contact sync connector with NewsWoo subscription data
- [ ] Verify Salesforce integration receives correct data

### 3E: Composer Integration
- [ ] Package NewsWoo as a Composer package (`type: wordpress-plugin`)
- [ ] Add to Newspack's `composer.json` as a path repository or WP Packages dependency
- [ ] Verify `composer/installers` puts it in `web/app/plugins/`
- [ ] Test alongside all 20 Newspack packages

## Phase 4: Subscription-First Architecture 🔧
**Goal:** Merge subscription plugins into core and build newsroom-native flows.

- [ ] Merge Subscriptions plugin into core (de-pluginize)
- [ ] Merge Memberships plugin into core
- [ ] Merge Name Your Price plugin into core
- [ ] Create unified "Subscription Plan" post type replacing product variations
- [ ] Build paywall-aware checkout flow (direct from article to payment)
- [ ] Implement "Buy Now" button that skips cart entirely
- [ ] Create streamlined My Account dashboard for subscription management
- [ ] Build subscription tier selector UI component

## Phase 5: Newsroom Features 📰
**Goal:** Add publisher-specific functionality.

- [ ] Paywall integration hooks for Newspack
- [ ] Metered access support (X free articles per month)
- [ ] Reader revenue dashboard (MRR, churn, LTV)
- [ ] Email newsletter integration hooks (Mailchimp, ActiveCampaign)
- [ ] CRM webhook templates
- [ ] Gift subscription flow (using Subscriptions Gifting)
- [ ] Donation flow with Name Your Price
- [ ] Apple Pay / Google Pay express checkout

## Phase 6: Performance & Polish ⚡
**Goal:** Optimize for speed and developer experience.

- [ ] Database schema optimization (remove unused tables)
- [ ] Lazy-load only subscription-relevant admin assets
- [ ] Remove unused Gutenberg blocks (product grids, shop pages, etc.)
- [ ] Strip unused REST API endpoints
- [ ] Optimize autoloaded options (remove shipping/inventory/retail options)
- [ ] Performance benchmarks vs. standard WooCommerce
- [ ] Developer documentation and hook reference
- [ ] CI/CD pipeline setup

## Phase 7: Testing & Release 🚀
**Goal:** Production-ready release.

- [ ] Unit tests for stripped subsystems (verify clean removal)
- [ ] Integration tests for subscription flows
- [ ] Payment gateway testing (Stripe, PayPal)
- [ ] Newspack compatibility testing (all 20 packages)
- [ ] WordPress multisite compatibility
- [ ] Security audit
- [ ] Performance benchmarks published
- [ ] Beta release for publisher testing
- [ ] 1.0 stable release

---

## Code Analysis Summary

| System | Files Affected | Complexity | Phase |
|--------|---------------|------------|-------|
| Shipping | 12 direct | Low-Medium | 2A |
| Inventory/Stock | 108 | High | 2B |
| Cart | 96 | High | 2C |
| Coupons | 69 | Medium | 2D |
| Tax/Geolocation | 80 | Medium | 2E |
| Retail Products | 79 | Medium | 2F |
| Newspack Integration | 12+ classes | Medium | 3 |
| **Total unique files** | **~330** | — | — |

### Estimated Effort

| Phase | Duration | Priority |
|-------|----------|----------|
| Phase 1: Foundation | ✅ Complete | — |
| Phase 2: Core Stripping | 6-8 weeks | Critical |
| Phase 3: Newspack Integration | 3-4 weeks | Critical |
| Phase 4: Subscription Architecture | 4-6 weeks | Critical |
| Phase 5: Newsroom Features | 4-6 weeks | High |
| Phase 6: Performance | 2-3 weeks | Medium |
| Phase 7: Testing & Release | 3-4 weeks | Critical |
| **Total** | **~23-31 weeks** | — |

---

*Last updated: 2026-09-19*

