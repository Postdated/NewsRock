# NewsWoo Code Analysis Report

Detailed analysis of the WooCommerce plugin ecosystem for the NewsWoo fork.

---

## 1. Plugin Inventory

### WooCommerce Core 11.1.1
- **Total Lines of Code:** 800,537
- **Primary Language:** PHP
- **Key Directories:**
  - `includes/` — Core business logic, data stores, REST API, admin
  - `assets/` — Frontend JS/CSS, fonts (Inter, WooCommerce icon font, Cardo, Star)
  - `templates/` — Overridable template files
  - `patterns/` — Gutenberg block patterns
  - `packages/` — Block editor components
  - `src/` — React-based admin blocks

### WooCommerce Subscriptions 9.2.0
- **Total Lines of Code:** 155,157
- **Purpose:** Recurring billing, subscription management, renewal processing
- **Key Components:**
  - Subscription lifecycle management (active, cancelled, expired, suspended)
  - Renewal order generation
  - Payment retry logic
  - Subscription switching (upgrade/downgrade)
  - Synchronization and proration
  - Mixed cart handling (subscription + one-time)

### WooCommerce Memberships 1.30.0
- **Total Lines of Code:** 146,424
- **Purpose:** Content restriction, member-only access, drip content
- **Key Components:**
  - Membership plan creation and management
  - Content restriction rules (per-post, per-category, per-page)
  - Drip content scheduling
  - Member area / My Account integration
  - Import/export membership data

### Name Your Price 3.8.2
- **Total Lines of Code:** 10,325
- **Purpose:** Allow customers to set their own price (donations, pay-what-you-want)
- **Key Components:**
  - Price input field on product pages
  - Minimum/maximum price validation
  - Suggested price display
  - Cart/checkout price override

### Subscriptions Gifting 2.9.1
- **Total Lines of Code:** 7,092
- **Purpose:** Allow purchasing subscriptions as gifts for others
- **Key Components:**
  - Gift recipient email flow
  - Recipient account creation
  - Gift redemption page
  - Gift notification emails

---

## 2. Removable Subsystem Analysis

### 2A: Shipping & Fulfillment
**Files with shipping references:** 12 direct files

**Core files to modify/remove:**
- `includes/class-wc-shipping.php` — Shipping manager class
- `includes/class-wc-shipping-rate.php` — Shipping rate data object
- `includes/class-wc-shipping-zone.php` — Shipping zone model
- `includes/class-wc-shipping-zones.php` — Shipping zones manager
- `includes/shipping/` — All shipping method implementations (flat rate, free shipping, local pickup)
- `includes/class-wc-cart.php` — Shipping calculation methods
- `includes/class-wc-checkout.php` — Shipping address processing
- `includes/admin/settings/` — Shipping settings pages

**Database tables affected:**
- `woocommerce_shipping_zones`
- `woocommerce_shipping_zone_locations`
- `woocommerce_shipping_zone_methods`

**Cascade risk:** Low — Shipping is largely self-contained with clear entry points.

---

### 2B: Inventory & Stock Management
**Files with inventory references:** 108 files

**Core files to modify/remove:**
- `includes/class-wc-product-simple.php` — Stock methods
- `includes/class-wc-product-variable.php` — Variable product stock
- `includes/class-wc-product-variation.php` — Variation stock
- `includes/data-stores/class-wc-product-data-store-cpt.php` — Stock persistence
- `includes/class-wc-order.php` — Stock reduction on order
- `includes/wc-stock-functions.php` — Stock utility functions
- `includes/emails/` — Low stock / out of stock notifications
- `includes/admin/list-tables/` — Stock columns in product list

**Database fields affected:**
- `_stock`, `_stock_status`, `_manage_stock`, `_backorders` post meta
- Stock-related order meta

**Cascade risk:** HIGH — Stock management is deeply integrated into product lifecycle, order processing, and admin UI. Requires careful extraction.

---

### 2C: Cart System
**Files with cart references:** 96 files

**Core files to modify/remove:**
- `includes/class-wc-cart.php` — Cart class (major refactor needed)
- `includes/class-wc-cart-session.php` — Cart session handling
- `includes/class-wc-cart-totals.php` — Cart total calculations
- `includes/class-wc-cart-fees.php` — Cart fee handling
- `includes/wc-cart-functions.php` — Cart utility functions
- `includes/class-wc-frontend-scripts.php` — Cart AJAX scripts
- `templates/cart/` — Cart page templates
- `includes/widgets/class-wc-widget-cart.php` — Cart widget

**Approach:** Rather than removing the cart entirely, convert it to a minimal "payment session" that holds only the subscription/membership being purchased and routes directly to checkout.

**Cascade risk:** HIGH — The cart is the central hub of WooCommerce's purchase flow. Refactoring it affects nearly every purchase-related file.

---

### 2D: Coupon System
**Files with coupon references:** 69 files

**Core files to modify/remove:**
- `includes/class-wc-coupon.php` — Coupon data model
- `includes/wc-coupon-functions.php` — Coupon utilities
- `includes/class-wc-discounts.php` — Discount calculation engine
- `includes/data-stores/class-wc-coupon-data-store-cpt.php` — Coupon persistence
- `includes/admin/settings/` — Coupon settings

**Keep:** Basic percentage and fixed-amount coupons for promotional subscriptions.
**Remove:** Free shipping coupons, product-specific exclusion logic, usage limit complexity, combination rules.

**Cascade risk:** Medium — Coupons are used in cart and checkout but are modular enough to simplify.

---

### 2E: Tax & Geolocation
**Files with tax/geolocation references:** 80 files

**Core files to modify/remove:**
- `includes/class-wc-tax.php` — Tax calculation engine
- `includes/class-wc-geo-ip.php` — GeoIP database lookup
- `includes/class-wc-geolocation.php` — Geolocation service
- `includes/class-wc-geolite-integration.php` — MaxMind integration
- `includes/class-wc-countries.php` — Country-based tax rules
- `includes/admin/settings/` — Tax settings pages

**Approach:** Simplify tax to billing-address-only. Remove shipping-based tax calculations and geo-IP lookups. Keep basic VAT/sales tax support for digital goods.

**Cascade risk:** Medium — Tax is intertwined with checkout and order processing but the geo-location layer is cleanly separable.

---

### 2F: Retail Product Types
**Files with grouped/external/variable references:** 79 files

**Core files to modify/remove:**
- `includes/class-wc-product-grouped.php` — Grouped product class
- `includes/class-wc-product-external.php` — External/affiliate product class
- `includes/class-wc-product-variable.php` — Complex variable product (simplify, don't remove)
- `includes/class-wc-product-variation.php` — Product variations
- `includes/class-wc-product-attribute.php` — Complex attribute system
- `includes/admin/` — Product type selectors and meta boxes

**Approach:** Remove grouped and external product types entirely. Simplify variable products to a basic "Subscription Plan" selector (e.g., Monthly / Annual / Lifetime) without the full attribute matrix.

**Cascade risk:** Medium — Product types are well-abstracted through the factory pattern, making removal cleaner than other subsystems.

---

## 3. File Overlap Matrix

Many files reference multiple removable subsystems. Key overlap areas:

| File | Shipping | Inventory | Cart | Coupons | Tax | Products |
|------|----------|-----------|------|---------|-----|----------|
| class-wc-cart.php | ✓ | | ✓ | ✓ | ✓ | |
| class-wc-checkout.php | ✓ | ✓ | ✓ | ✓ | ✓ | |
| class-wc-order.php | ✓ | ✓ | | ✓ | ✓ | |
| class-wc-product-*.php | | ✓ | | | | ✓ |
| wc-template-functions.php | ✓ | ✓ | ✓ | | ✓ | ✓ |
| admin/settings/*.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |

**Total unique files affected:** ~320 (out of ~2,000+ PHP files)

---

## 4. Recommended Stripping Order

1. **Shipping** (Phase 2A) — Most self-contained, lowest cascade risk
2. **Retail Product Types** (Phase 2F) — Clean factory pattern makes removal straightforward
3. **Geolocation** (partial 2E) — Remove geo-IP before simplifying tax
4. **Tax Simplification** (rest of 2E) — Reduce to billing-only after geo removal
5. **Inventory** (Phase 2B) — High impact but necessary before cart refactor
6. **Coupon Simplification** (Phase 2D) — Simplify before cart refactor
7. **Cart Refactor** (Phase 2C) — Do last since it depends on all other removals being clean

---

## 5. Key Risks & Mitigations

| Risk | Impact | Mitigation |
|------|--------|------------|
| Subscription hooks depend on removed classes | Breaking | Map all hook dependencies before removal; create compatibility shims |
| Memberships uses product data for access rules | Breaking | Audit membership restriction logic before product type removal |
| Payment gateways expect cart/checkout flow | Breaking | Maintain gateway API contract even with simplified cart |
| Database upgrade path breaks existing installs | Data loss | Write migration scripts; never delete tables, only stop writing to them |
| Third-party extensions expect removed classes | Compat | Maintain deprecated stub classes with `_doing_it_wrong()` notices |

---

## 6. Testing Strategy

- **Unit Tests:** PHPUnit for each removed subsystem (verify clean removal)
- **Integration Tests:** End-to-end subscription purchase flow
- **Regression Tests:** Existing WooCommerce test suite (adapted)
- **Performance Tests:** Page load time, database query count, memory usage
- **Compatibility Tests:** Newspack theme and plugin integration

---

*Analysis based on WooCommerce 11.1.1, Subscriptions 9.2.0, Memberships 1.30.0, Name Your Price 3.8.2, Subscriptions Gifting 2.9.1*
*Generated: 2026-09-19*



---

## 7. Newspack Integration Analysis

### Newspack's WooCommerce Layer

The [Postdated/Newspack](https://github.com/Postdated/Newspack) Bedrock installation has a deep WooCommerce integration layer in `newspack-plugin`. NewsWoo must maintain full API compatibility with these classes.

### 7A: WooCommerce_Connection (newspack-plugin)

**File:** `includes/plugins/woocommerce/class-woocommerce-connection.php`

This is the central integration class. It:
- Defines `ACTIVE_SUBSCRIPTION_STATUSES` (`active`, `pending-cancel`)
- Defines `ACTIVE_ORDER_STATUSES` (`processing`, `completed`)
- Defines `FORMER_SUBSCRIBER_STATUSES` (`on-hold`, `cancelled`, `expired`)
- Suppresses WooCommerce's setup wizard (`woocommerce_prevent_automatic_wizard_redirect`)
- Disables legacy form checkout
- Forces subscription switching and failed payment retry
- Hooks into order completion for reader display name updates
- Disables related products
- Handles Stripe payment method saving
- Custom receipt and cancellation emails
- Rate limiting on checkout and payment methods

**Compatibility requirement:** All `woocommerce_*` hooks and `WC_Subscription` status constants must remain unchanged.

### 7B: Modal_Checkout (newspack-blocks)

**File:** `includes/class-modal-checkout.php`

Newspack's modal checkout system provides a streamlined purchase flow that bypasses the standard cart/checkout pages. It:
- Renders checkout in a modal overlay on article pages
- Handles coupon auto-application from Checkout Button blocks
- Manages gift subscription flow
- Rate limits checkout attempts
- Works with Stripe, WCPAY, and other gateways
- Enqueues specific scripts (`newspack-wc`, `newspack-ui`, etc.)

**Compatibility requirement:** NewsWoo must keep the WooCommerce checkout AJAX endpoints and order processing hooks that the modal checkout depends on.

### 7C: Content_Gate & Metering (newspack-plugin)

**Files:** `includes/content-gate/class-content-gate.php`, `class-metering.php`, `class-access-rules.php`

The content gating system:
- Uses a custom post type (`np_content_gate`) for gate layouts
- Implements metered access (X free articles before paywall)
- Supports tiered paywalls (one-tier, two-tier, three-tier patterns)
- Integrates with email verification
- Uses `Access_Rules` and `Access_Attribution` for per-post access decisions

**Compatibility requirement:** NewsWoo subscription and membership data must be readable by Newspack's access rule system.

### 7D: Data Events & ESP Sync

**Files:** `includes/data-events/listeners.php`, `class-contact-sync-connector.php`

Newspack fires data events on WooCommerce actions (order completed, subscription changed, etc.) and syncs them to email service providers. Key hooks:
- `woocommerce_order_status_completed` → contact sync
- Subscription status changes → ESP segment updates
- User registration → contact creation

**Compatibility requirement:** All order and subscription status change hooks must fire with the same parameters.

### 7E: Additional WooCommerce Integration Files

| File | Purpose |
|------|---------|
| `class-woocommerce-logs.php` | Custom logging |
| `class-woocommerce-cli.php` | WP-CLI commands |
| `class-woocommerce-cover-fees.php` | Processing fee coverage |
| `class-woocommerce-emails.php` | Custom email templates |
| `class-woocommerce-email-style-sync.php` | Email styling |
| `class-woocommerce-order-utm.php` | UTM tracking on orders |
| `class-woocommerce-products.php` | Product utilities |
| `class-woocommerce-product-validator.php` | Product validation |
| `class-woocommerce-duplicate-orders.php` | Duplicate order prevention |
| `class-woocommerce-update-payment-notice.php` | Payment update notices |
| `class-woocommerce-custom-currency-symbol.php` | Currency display |

---

## 8. Stripping Priority (Updated with Newspack Context)

The recommended order now accounts for Newspack integration risk:

1. **Shipping** (Phase 2A) — Self-contained, no Newspack dependencies
2. **Retail Product Types** (Phase 2F) — Clean removal, Newspack uses simple/subscription products only
3. **Geolocation** (partial 2E) — No Newspack dependency
4. **Tax Simplification** (rest of 2E) — Newspack uses billing-only tax
5. **Inventory** (Phase 2B) — Newspack doesn't use stock management
6. **Coupon Simplification** (Phase 2D) — Keep basic coupons, remove shipping coupons
7. **Cart Refactor** (Phase 2C) — CRITICAL: Must preserve modal checkout compatibility
8. **Newspack Integration Testing** (Phase 3) — Validate after each stripping phase

---

*Analysis based on WooCommerce 11.1.1, Subscriptions 9.2.0, Memberships 1.30.0, Name Your Price 3.8.2, Subscriptions Gifting 2.9.1, Newspack Plugin 6.52.0-alpha.1*
*Generated: 2026-09-19*

