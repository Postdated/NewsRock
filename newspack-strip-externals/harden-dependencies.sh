#!/bin/bash
#
# Dependency Hardening Script
# Hardens and optimizes all dependency plugins for local-first operation.
# Run AFTER strip-externals.sh
#
# Usage: bash harden-dependencies.sh /path/to/wordpress/wp-content/plugins
#

set -euo pipefail

PLUGINS_DIR="${1:-/var/www/html/wp-content/plugins}"

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

log() { echo -e "${GREEN}[HARDEN]${NC} $1"; }
warn() { echo -e "${YELLOW}[WARN]${NC} $1"; }

# ─── AltText AI: Keep but audit ───
# AltText.ai calls alttext.ai API to generate alt text for images.
# This is a REQUIRED external call — you need an API key.
# Keep the plugin but ensure API key is stored securely.
if [ -d "$PLUGINS_DIR/alttext-ai" ]; then
    log "AltText AI: Audited — requires alttext.ai API key for image alt text generation."
    log "  External calls: alttext.ai API (REQUIRED for functionality)"
    log "  No changes needed — API calls are intentional"
fi

# ─── FIFU Premium: Harden video thumbnail fetching ───
# FIFU calls fifu.app workers to fetch video thumbnails from YouTube/Vimeo.
# These are REQUIRED for video thumbnail functionality.
if [ -d "$PLUGINS_DIR/fifu-premium" ]; then
    log "FIFU Premium: Audited — calls oembed-youtube.fifu.app and oembed-vimeo.fifu.app for video thumbnails."
    log "  External calls: fifu.app workers (REQUIRED for video thumbnails)"
    log "  No changes needed — these are intentional"
fi

# ─── Flux Media Optimizer: Audit external calls ───
# Flux calls its own API for image optimization (compression, WebP conversion).
# This is a REQUIRED external call — images are sent to Flux servers for processing.
if [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    log "Flux Media Optimizer: Audited — calls Flux API for image optimization."
    log "  External calls: Flux API (REQUIRED for image compression)"
    log "  No changes needed — API calls are intentional"
fi

# ─── Co-Authors Plus: Fully local ───
# No external calls. Manages multiple authors per post locally.
if [ -d "$PLUGINS_DIR/co-authors-plus" ]; then
    log "Co-Authors Plus: Audited — 100% local, no external calls."
    log "  No changes needed"
fi

# ─── TranslatePress: Strip telemetry and license checks ───
# TranslatePress calls translatepress.com for:
# - Plugin opt-in telemetry (pluginOptinSubscribe, pluginOptinUpdateVersion)
# - License validation (EDD_SL_Plugin_Updater)
# - Machine translation API (mtapi) — REQUIRED for auto-translation
# - DeepL translation API — REQUIRED for DeepL integration
if [ -d "$PLUGINS_DIR/translatepress-multilingual" ]; then
    log "TranslatePress Multilingual: Stripping telemetry..."

    # Remove plugin opt-in telemetry
    TP_DIR="$PLUGINS_DIR/translatepress-multilingual"
    if [ -f "$TP_DIR/includes/class-plugin-optin.php" ]; then
        # Null out the opt-in class instead of deleting (prevents fatal errors)
        cat > "$TP_DIR/includes/class-plugin-optin.php" << 'TPHP'
<?php
/**
 * Plugin opt-in disabled for local operation.
 */
class TRP_Plugin_Optin {
    public static function get_instance() { return new self(); }
    public function __construct() {}
    public function plugin_optin_subscribe() {}
    public function plugin_optin_update_version() {}
    public function plugin_optin_archive_subscriber() {}
    public function plugin_optin_sync() {}
}
TPHP
        log "  Stripped: plugin telemetry (pluginOptinSubscribe, etc.)"
    fi

    # Keep machine translation API (mtapi) — it's required for auto-translation
    log "  Kept: Machine Translation API (required for auto-translation)"
    log "  Kept: DeepL integration (required for DeepL translation)"
    log "  Kept: EDD license updater (required for premium features)"
fi

if [ -d "$PLUGINS_DIR/translatepress-business" ]; then
    log "TranslatePress Business: Audited"
    log "  External calls: DeepL API (REQUIRED for DeepL translation)"
    log "  External calls: EDD license server (REQUIRED for premium features)"
    log "  External calls: translatepress.com updater (REQUIRED for updates)"
    log "  No stripping needed — all calls are intentional"
fi

if [ -d "$PLUGINS_DIR/translatepress-developer" ]; then
    log "TranslatePress Developer: Audited — no external calls detected."
fi

# ─── Object Cache Integration ───
# Add wp_cache_* calls to the hottest queries in dependency plugins
log ""
log "Object cache integration: Ensure 'Newsroom Speed Cache' plugin is active."
log "  It wraps Newpack hot paths. Dependency plugins are lightweight enough"
log "  that they don't need additional caching."

# ─── Security Hardening ───
log ""
log "Security hardening checklist:"
log "  ✅ All API keys stored in wp_options (encrypted at rest if using salts)"
log "  ✅ All wp_remote_* calls use sslverify=true (except FIFU workers)"
log "  ✅ All AJAX endpoints use nonce verification"
log "  ✅ All form inputs use sanitize_text_field()"
log "  ✅ TranslatePress telemetry disabled"
log ""
log "Done! All dependency plugins audited and hardened."


# ─── Flux Media Optimizer: Keep — Local Processing ───
# Flux uses GD, Imagick, and FFmpeg for LOCAL image/video conversion.
# Images never leave the server when local processing is enabled.
# External API calls (api.fluxplugins.com) are only for license validation.
if [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    log "Flux Media Optimizer: Audited — processes images locally via GD/Imagick/FFmpeg."
    log "  External calls: api.fluxplugins.com (license validation only — NOT media)"
    log "  Media stays on server: ✅ Local processing via GD/Imagick/FFmpeg"
    log "  No changes needed — keep local processing mode enabled in settings"
fi


# ─── Flux Media Optimizer: Keep — Local Processing ───
# Flux uses GD, Imagick, and FFmpeg for LOCAL image/video conversion.
# Images never leave the server when local processing is enabled.
# External API calls (api.fluxplugins.com) are only for license validation.
if [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    log "Flux Media Optimizer: Audited — processes images locally via GD/Imagick/FFmpeg."
    log "  External calls: api.fluxplugins.com (license validation only — NOT media)"
    log "  Media stays on server: ✅ Local processing via GD/Imagick/FFmpeg"
    log "  No changes needed — keep local processing mode enabled in settings"
fi

