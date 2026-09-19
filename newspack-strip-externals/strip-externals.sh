#!/bin/bash
#
# Newspack External Stripper (Bedrock Edition)
# Removes external service dependencies from Newpack plugins.
# Designed for Roots Bedrock WordPress installs.
#
# Usage: bash strip-externals.sh /path/to/bedrock/web/app/plugins
#
set -euo pipefail

PLUGINS_DIR="${1:-./web/app/plugins}"
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'
log() { echo -e "${GREEN}[STRIP]${NC} $1"; }
warn() { echo -e "${YELLOW}[WARN]${NC} $1"; }

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
    log "  Kept: base provider class (needed by local ESPs)"
fi

# ─── Newspack Plugin: Remove External Dependencies ───
NP_DIR="$PLUGINS_DIR/newspack-plugin/includes"
if [ -d "$NP_DIR" ]; then
    log "Stripping external dependencies from newspack-plugin..."
    for f in class-google-oauth.php class-google-oauth-ga4-client.php class-google-login.php class-google-services-connection.php; do
        if [ -f "$NP_DIR/oauth/$f" ]; then rm -f "$NP_DIR/oauth/$f"; log "  Removed: oauth/$f"; fi
    done
    if [ -f "$NP_DIR/oauth/class-mailchimp-api.php" ]; then rm -f "$NP_DIR/oauth/class-mailchimp-api.php"; log "  Removed: oauth/class-mailchimp-api.php"; fi
    if [ -f "$NP_DIR/class-salesforce.php" ]; then rm -f "$NP_DIR/class-salesforce.php"; log "  Removed: class-salesforce.php"; fi
    if [ -f "$NP_DIR/class-recaptcha.php" ]; then rm -f "$NP_DIR/class-recaptcha.php"; log "  Removed: class-recaptcha.php"; fi
    for f in class-meta-pixel.php class-twitter-pixel.php; do
        if [ -f "$NP_DIR/tracking/$f" ]; then rm -f "$NP_DIR/tracking/$f"; log "  Removed: tracking/$f"; fi
    done
    if [ -d "$NP_DIR/optional-modules/nextdoor" ]; then rm -rf "$NP_DIR/optional-modules/nextdoor"; log "  Removed: optional-modules/nextdoor"; fi
    if [ -d "$NP_DIR/starter_content" ]; then rm -rf "$NP_DIR/starter_content"; log "  Removed: starter_content"; fi
    if [ -f "$NP_DIR/data-events/class-webhooks.php" ]; then rm -f "$NP_DIR/data-events/class-webhooks.php"; log "  Removed: data-events/class-webhooks.php"; fi
    if [ -f "$NP_DIR/data-events/class-api.php" ]; then rm -f "$NP_DIR/data-events/class-api.php"; log "  Removed: data-events/class-api.php"; fi
    for f in class-contact-pull.php class-contact-cron.php class-esp.php; do
        if [ -f "$NP_DIR/reader-activation/integrations/$f" ]; then rm -f "$NP_DIR/reader-activation/integrations/$f"; log "  Removed: reader-activation/integrations/$f"; fi
    done
fi

echo ""
log "Done! External dependencies stripped."

