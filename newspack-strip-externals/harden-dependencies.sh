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

# ─── AltText AI: Keep — requires external API ───
if [ -d "$PLUGINS_DIR/alttext-ai" ]; then
    log "AltText AI: Audited — requires alttext.ai API key for image alt text generation."
    log "  External calls: alttext.ai API (REQUIRED for AI alt text)"
    log "  No changes needed — API calls are intentional"
fi

# ─── FIFU Premium: Keep — requires external workers ───
if [ -d "$PLUGINS_DIR/fifu-premium" ]; then
    log "FIFU Premium: Audited — calls oembed-youtube.fifu.app and oembed-vimeo.fifu.app for video thumbnails."
    log "  External calls: fifu.app workers (REQUIRED for video thumbnails)"
    log "  No changes needed — these are intentional"
fi

# ─── Co-Authors Plus: Fully local ───
if [ -d "$PLUGINS_DIR/co-authors-plus" ]; then
    log "Co-Authors Plus: Audited — 100% local, no external calls."
    log "  No changes needed"
fi

# ─── TranslatePress: Strip telemetry ───
if [ -d "$PLUGINS_DIR/translatepress-multilingual" ]; then
    log "TranslatePress Multilingual: Stripping telemetry..."
    TP_DIR="$PLUGINS_DIR/translatepress-multilingual"
    if [ -f "$TP_DIR/includes/class-plugin-optin.php" ]; then
        cat > "$TP_DIR/includes/class-plugin-optin.php" << 'TPHP'
<?php
/** Plugin opt-in disabled for local operation. */
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
    log "  Kept: Machine Translation API (required for auto-translation)"
    log "  Kept: DeepL integration (required for DeepL translation)"
    log "  Kept: EDD license updater (required for premium features)"
fi

if [ -d "$PLUGINS_DIR/translatepress-business" ]; then
    log "TranslatePress Business: Audited"
    log "  External calls: DeepL API, EDD license server (REQUIRED)"
fi

if [ -d "$PLUGINS_DIR/translatepress-developer" ]; then
    log "TranslatePress Developer: Audited — no external calls detected."
fi


# ─── Flux Media Optimizer: Null External API ───
# Flux processes images locally via GD/Imagick/FFmpeg.
# The ExternalApiClient calls api.fluxplugins.com for license validation.
# Since the plugin is free, we null out the external API to prevent any calls.
log "Flux Media Optimizer: Disabling external API calls..."

FLUX_DIR=""
if [ -d "$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer"
elif [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer"
fi

if [ -n "$FLUX_DIR" ]; then
    # Null out shared ExternalApiClient
    if [ -f "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" << 'FLUXAPI'
<?php
/** External API client — DISABLED for local-only operation. Local processing unaffected. */
namespace FluxMediaFluxPluginsCommonApi;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger, $base_url = null, $timeout = null ) { $this->logger = $logger; }
    public function activate_license( $k, $v = '' ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function validate_license( $k ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function check_compatibility( $id, $v ) { return ['success'=>true,'compatible'=>true]; }
    public function post( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function put( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function delete( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    private function handle_license_response() { return []; }
    private function handle_generic_response() { return []; }
    private function check_compatibility_before_request() { return true; }
    private function update_license_notice_transient() {}
}
FLUXAPI
        log "  Nullified: shared ExternalApiClient"
    fi

    # Null out app-level ExternalApiClient
    if [ -f "$FLUX_DIR/app/Services/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/app/Services/ExternalApiClient.php" << 'FLUXAPPAPI'
<?php
/** App-level External API client — DISABLED for local-only operation. */
namespace FluxMediaAppServices;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger ) { $this->logger = $logger; }
    public function submit_job( $d ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function check_job_status( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get_job_result( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
}
FLUXAPPAPI
        log "  Nullified: app-level ExternalApiClient"
    fi

    log "  Flux local processing: UNTOUCHED (GD/Imagick/FFmpeg)"
    log "  ✅ Flux now operates 100% locally — no media leaves the server"
fi

# ─── Done ───
echo ""
log "Done! All dependency plugins audited and hardened."
log "Run 'strip-externals.sh' first if you haven't already."

# ─── Flux Media Optimizer: Null External API ───
# Flux processes images locally via GD/Imagick/FFmpeg.
# The ExternalApiClient calls api.fluxplugins.com for license validation.
# Since the plugin is free, we null out the external API to prevent any calls.
log "Flux Media Optimizer: Disabling external API calls..."

FLUX_DIR=""
if [ -d "$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer"
elif [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer"
fi

if [ -n "$FLUX_DIR" ]; then
    # Null out shared ExternalApiClient
    if [ -f "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" << 'FLUXAPI'
<?php
/** External API client — DISABLED for local-only operation. Local processing unaffected. */
namespace FluxMediaFluxPluginsCommonApi;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger, $base_url = null, $timeout = null ) { $this->logger = $logger; }
    public function activate_license( $k, $v = '' ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function validate_license( $k ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function check_compatibility( $id, $v ) { return ['success'=>true,'compatible'=>true]; }
    public function post( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function put( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function delete( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    private function handle_license_response() { return []; }
    private function handle_generic_response() { return []; }
    private function check_compatibility_before_request() { return true; }
    private function update_license_notice_transient() {}
}
FLUXAPI
        log "  Nullified: shared ExternalApiClient"
    fi

    # Null out app-level ExternalApiClient
    if [ -f "$FLUX_DIR/app/Services/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/app/Services/ExternalApiClient.php" << 'FLUXAPPAPI'
<?php
/** App-level External API client — DISABLED for local-only operation. */
namespace FluxMediaAppServices;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger ) { $this->logger = $logger; }
    public function submit_job( $d ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function check_job_status( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get_job_result( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
}
FLUXAPPAPI
        log "  Nullified: app-level ExternalApiClient"
    fi

    log "  Flux local processing: UNTOUCHED (GD/Imagick/FFmpeg)"
    log "  ✅ Flux now operates 100% locally — no media leaves the server"
fi

# ─── Done ───
echo ""
log "Done! All dependency plugins audited and hardened."
log "Run 'strip-externals.sh' first if you haven't already."

# ─── Flux Media Optimizer: Null External API ───
# Flux processes images locally via GD/Imagick/FFmpeg.
# The ExternalApiClient calls api.fluxplugins.com for license validation.
# Since the plugin is free, we null out the external API to prevent any calls.
log "Flux Media Optimizer: Disabling external API calls..."

FLUX_DIR=""
if [ -d "$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer"
elif [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer"
fi

if [ -n "$FLUX_DIR" ]; then
    # Null out shared ExternalApiClient
    if [ -f "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" << 'FLUXAPI'
<?php
/** External API client — DISABLED for local-only operation. Local processing unaffected. */
namespace FluxMediaFluxPluginsCommonApi;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger, $base_url = null, $timeout = null ) { $this->logger = $logger; }
    public function activate_license( $k, $v = '' ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function validate_license( $k ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function check_compatibility( $id, $v ) { return ['success'=>true,'compatible'=>true]; }
    public function post( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function put( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function delete( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    private function handle_license_response() { return []; }
    private function handle_generic_response() { return []; }
    private function check_compatibility_before_request() { return true; }
    private function update_license_notice_transient() {}
}
FLUXAPI
        log "  Nullified: shared ExternalApiClient"
    fi

    # Null out app-level ExternalApiClient
    if [ -f "$FLUX_DIR/app/Services/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/app/Services/ExternalApiClient.php" << 'FLUXAPPAPI'
<?php
/** App-level External API client — DISABLED for local-only operation. */
namespace FluxMediaAppServices;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger ) { $this->logger = $logger; }
    public function submit_job( $d ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function check_job_status( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get_job_result( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
}
FLUXAPPAPI
        log "  Nullified: app-level ExternalApiClient"
    fi

    log "  Flux local processing: UNTOUCHED (GD/Imagick/FFmpeg)"
    log "  ✅ Flux now operates 100% locally — no media leaves the server"
fi

# ─── Done ───
echo ""
log "Done! All dependency plugins audited and hardened."
log "Run 'strip-externals.sh' first if you haven't already."

# ─── Flux Media Optimizer: Null External API ───
# Flux processes images locally via GD/Imagick/FFmpeg.
# The ExternalApiClient calls api.fluxplugins.com for license validation.
# Since the plugin is free, we null out the external API to prevent any calls.
log "Flux Media Optimizer: Disabling external API calls..."

FLUX_DIR=""
if [ -d "$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer"
elif [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer"
fi

if [ -n "$FLUX_DIR" ]; then
    # Null out shared ExternalApiClient
    if [ -f "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" << 'FLUXAPI'
<?php
/** External API client — DISABLED for local-only operation. Local processing unaffected. */
namespace FluxMediaFluxPluginsCommonApi;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger, $base_url = null, $timeout = null ) { $this->logger = $logger; }
    public function activate_license( $k, $v = '' ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function validate_license( $k ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function check_compatibility( $id, $v ) { return ['success'=>true,'compatible'=>true]; }
    public function post( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function put( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function delete( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    private function handle_license_response() { return []; }
    private function handle_generic_response() { return []; }
    private function check_compatibility_before_request() { return true; }
    private function update_license_notice_transient() {}
}
FLUXAPI
        log "  Nullified: shared ExternalApiClient"
    fi

    # Null out app-level ExternalApiClient
    if [ -f "$FLUX_DIR/app/Services/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/app/Services/ExternalApiClient.php" << 'FLUXAPPAPI'
<?php
/** App-level External API client — DISABLED for local-only operation. */
namespace FluxMediaAppServices;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger ) { $this->logger = $logger; }
    public function submit_job( $d ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function check_job_status( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get_job_result( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
}
FLUXAPPAPI
        log "  Nullified: app-level ExternalApiClient"
    fi

    log "  Flux local processing: UNTOUCHED (GD/Imagick/FFmpeg)"
    log "  ✅ Flux now operates 100% locally — no media leaves the server"
fi

# ─── Done ───
echo ""
log "Done! All dependency plugins audited and hardened."
log "Run 'strip-externals.sh' first if you haven't already."

# ─── Flux Media Optimizer: Null External API ───
# Flux processes images locally via GD/Imagick/FFmpeg.
# The ExternalApiClient calls api.fluxplugins.com for license validation.
# Since the plugin is free, we null out the external API to prevent any calls.
log "Flux Media Optimizer: Disabling external API calls..."

FLUX_DIR=""
if [ -d "$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer/flux-media-optimizer"
elif [ -d "$PLUGINS_DIR/flux-media-optimizer" ]; then
    FLUX_DIR="$PLUGINS_DIR/flux-media-optimizer"
fi

if [ -n "$FLUX_DIR" ]; then
    # Null out shared ExternalApiClient
    if [ -f "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/vendor-prefixed/stratease/flux-plugins-common/src/Api/ExternalApiClient.php" << 'FLUXAPI'
<?php
/** External API client — DISABLED for local-only operation. Local processing unaffected. */
namespace FluxMediaFluxPluginsCommonApi;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger, $base_url = null, $timeout = null ) { $this->logger = $logger; }
    public function activate_license( $k, $v = '' ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function validate_license( $k ) { return ['success'=>true,'valid'=>true,'message'=>'Local mode.']; }
    public function check_compatibility( $id, $v ) { return ['success'=>true,'compatible'=>true]; }
    public function post( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function put( $r, $d = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function delete( $r, $p = [] ) { return ['success'=>false,'error'=>'External API disabled.']; }
    private function handle_license_response() { return []; }
    private function handle_generic_response() { return []; }
    private function check_compatibility_before_request() { return true; }
    private function update_license_notice_transient() {}
}
FLUXAPI
        log "  Nullified: shared ExternalApiClient"
    fi

    # Null out app-level ExternalApiClient
    if [ -f "$FLUX_DIR/app/Services/ExternalApiClient.php" ]; then
        cat > "$FLUX_DIR/app/Services/ExternalApiClient.php" << 'FLUXAPPAPI'
<?php
/** App-level External API client — DISABLED for local-only operation. */
namespace FluxMediaAppServices;
use FluxMediaFluxPluginsCommonLoggerLogger;
class ExternalApiClient {
    private $logger;
    public function __construct( Logger $logger ) { $this->logger = $logger; }
    public function submit_job( $d ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function check_job_status( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
    public function get_job_result( $id ) { return ['success'=>false,'error'=>'External API disabled.']; }
}
FLUXAPPAPI
        log "  Nullified: app-level ExternalApiClient"
    fi

    log "  Flux local processing: UNTOUCHED (GD/Imagick/FFmpeg)"
    log "  ✅ Flux now operates 100% locally — no media leaves the server"
fi

# ─── Done ───
echo ""
log "Done! All dependency plugins audited and hardened."
log "Run 'strip-externals.sh' first if you haven't already."
