<?php
/**
 * Plugin Name: Newspack Local ESPs
 * Description: Adds 11 email service providers to Newspack Newsletters with full tag, attribute, segment, and merge tag support. Providers: Amazon SES, Resend, Plunk, Elastic Email, Mailgun, Mailtrap, Mail250, BillionMail, Mautic, Listmonk, and generic SMTP.
 * Version: 1.0.0
 * Requires PHP: 8.3
 * Requires at least: 6.5
 * Author: Newsroom
 * License: GPL-2.0-or-later
 *
 * @package Newspack_Local_ESPs
 */

namespace Newspack_Local_ESPs;

defined( 'ABSPATH' ) || exit;

// Load all providers
require_once __DIR__ . '/includes/providers/class-base-provider.php';
require_once __DIR__ . '/includes/providers/class-ses.php';
require_once __DIR__ . '/includes/providers/class-smtp.php';
require_once __DIR__ . '/includes/providers/class-resend.php';
require_once __DIR__ . '/includes/providers/class-plunk.php';
require_once __DIR__ . '/includes/providers/class-elastic-email.php';
require_once __DIR__ . '/includes/providers/class-mailgun.php';
require_once __DIR__ . '/includes/providers/class-mailtrap.php';
require_once __DIR__ . '/includes/providers/class-mail250.php';
require_once __DIR__ . '/includes/providers/class-billionmail.php';
require_once __DIR__ . '/includes/providers/class-mautic.php';
require_once __DIR__ . '/includes/providers/class-listmonk.php';

// Load helpers
require_once __DIR__ . '/includes/class-subscriber-sync.php';
require_once __DIR__ . '/includes/class-admin.php';

// Plugin initialization is handled by the classes themselves via static ::init() calls.

