#!/bin/bash
#
# Newspack External Stripper
# Removes external service dependencies from Newpack plugins.
# Run this once after installing the Newpack plugins on your WordPress site.
#
# Usage: bash strip-externals.sh /path/to/wordpress/wp-content/plugins
#
# What it removes:
# - ESP providers: Mailchimp, ActiveCampaign, Campaign Monitor, Constant Contact, Letterhead
# - Google OAuth / GA4 analytics
# - Meta Pixel / Twitter Pixel tracking
# - Salesforce CRM sync
# - reCAPTCHA (replace with local honeypot)
# - Nextdoor syndication
# - Starter content (WordPress.org API)
# - Data Events webhooks (external dispatch)
#
# What it keeps:
# - Local newsletter sending (via newspack-local-esps plugin)
# - Local tracking (open pixel, click redirect)
# - Content gating and metered paywall
# - Reader activation and registration
# - Bylines and authors
# - All block patterns and templates

set -euo pipefail

PLUGINS_DIR="${1:-/var/www/html/wp-content/plugins}"

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

log() { echo -e "${GREEN}[STRIP]${NC} $1"; }
warn() { echo -e "${YELLOW}[WARN]${NC} $1"; }
err() { echo -e "${RED}[ERR]${NC} $1"; }

# ─── Newspack Newsletters: Remove ESP Providers ───
NL_DIR="$PLUGINS_DIR/newspack-newsletters/newspack-newsletters/includes/service-providers"

if [ -d "$NL_DIR" ]; then
    log "Stripping ESP providers from newspack-newsletters..."

    for esp in mailchimp active_campaign campaign_monitor constant_contact letterhead; do
        if [ -d "$NL_DIR/$esp" ]; then
            rm -rf "$NL_DIR/$esp"
            log "  Removed: $esp"
        fi
    done

    # Remove the base provider class and interface only if you're using our local ESP plugin
    # Keep them because our local providers may extend them
    log "  Kept: base provider class (needed by local ESPs)"
else
    warn "newspack-newsletters service-providers directory not found"
fi

# ─── Newspack Plugin: Remove External Dependencies ───
NP_DIR="$PLUGINS_DIR/newspack-plugin/includes"

if [ -d "$NP_DIR" ]; then
    log "Stripping external dependencies from newspack-plugin..."

    # Google OAuth / GA4
    for f in class-google-oauth.php class-google-oauth-ga4-client.php class-google-login.php class-google-services-connection.php; do
        if [ -f "$NP_DIR/oauth/$f" ]; then
            rm -f "$NP_DIR/oauth/$f"
            log "  Removed: oauth/$f"
        fi
    done

    # Mailchimp OAuth
    if [ -f "$NP_DIR/oauth/class-mailchimp-api.php" ]; then
        rm -f "$NP_DIR/oauth/class-mailchimp-api.php"
        log "  Removed: oauth/class-mailchimp-api.php"
    fi

    # Salesforce
    if [ -f "$NP_DIR/class-salesforce.php" ]; then
        rm -f "$NP_DIR/class-salesforce.php"
        log "  Removed: class-salesforce.php"
    fi

    # reCAPTCHA
    if [ -f "$NP_DIR/class-recaptcha.php" ]; then
        rm -f "$NP_DIR/class-recaptcha.php"
        log "  Removed: class-recaptcha.php"
    fi

    # Tracking Pixels (Meta, Twitter)
    for f in class-meta-pixel.php class-twitter-pixel.php; do
        if [ -f "$NP_DIR/tracking/$f" ]; then
            rm -f "$NP_DIR/tracking/$f"
            log "  Removed: tracking/$f"
        fi
    done

    # Nextdoor syndication
    if [ -d "$NP_DIR/optional-modules/nextdoor" ]; then
        rm -rf "$NP_DIR/optional-modules/nextdoor"
        log "  Removed: optional-modules/nextdoor"
    fi

    # Starter content (WordPress.org API)
    if [ -d "$NP_DIR/starter_content" ]; then
        rm -rf "$NP_DIR/starter_content"
        log "  Removed: starter_content"
    fi

    # Data Events webhooks (keep the local data events, remove external dispatch)
    if [ -f "$NP_DIR/data-events/class-webhooks.php" ]; then
        rm -f "$NP_DIR/data-events/class-webhooks.php"
        log "  Removed: data-events/class-webhooks.php"
    fi

    if [ -f "$NP_DIR/data-events/class-api.php" ]; then
        rm -f "$NP_DIR/data-events/class-api.php"
        log "  Removed: data-events/class-api.php"
    fi

    # Reader Activation external integrations
    if [ -d "$NP_DIR/reader-activation/integrations" ]; then
        for f in class-contact-pull.php class-contact-cron.php class-esp.php; do
            if [ -f "$NP_DIR/reader-activation/integrations/$f" ]; then
                rm -f "$NP_DIR/reader-activation/integrations/$f"
                log "  Removed: reader-activation/integrations/$f"
            fi
        done
    fi
else
    warn "newspack-plugin includes directory not found"
fi

# ─── Done ───
echo ""
log "Done! External dependencies stripped."
log "Your plugins now run 100% local."
log ""
log "Next steps:"
log "  1. Activate 'Newspack Local ESPs' plugin for newsletter sending"
log "  2. Activate 'Newsroom Speed Cache' for object caching"
log "  3. Activate 'Newsroom Image Downloader' for image importing"
log "  4. Activate 'Newpack Discord Bot API' for Discord integration"

