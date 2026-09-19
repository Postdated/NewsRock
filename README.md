# Newspack Newsroom Suite

A complete local-first newsroom toolkit for WordPress. 8 plugins that work with Newpack to give you everything you need to run a newsroom — with zero external dependencies except your chosen email sending provider.

## Plugins

### 1. Newsroom Speed Cache
Makes your newsroom blazing fast by wrapping Newpack's heaviest database queries with instant object cache lookups. Works with Memcached, Redis, APCu, or any WordPress object cache backend.

### 2. Newspack Local ESPs
11 email service providers hooked into Newpack Newsletters:
- **Amazon SES** — AWS Sig v4 API
- **Generic SMTP** — PHPMailer for any SMTP server
- **Resend** — Modern email API
- **Plunk** — All-in-one email platform
- **Elastic Email** — Affordable email delivery
- **Mailgun** — Email API with recipient variables
- **Mailtrap** — Email delivery for dev teams
- **Mail250** — Bulk email service
- **BillionMail** — Self-hosted email marketing
- **Mautic** — Open-source marketing automation
- **Listmonk** — Self-hosted mailing list manager

Each provider includes full merge tag support, subscriber sync with tags/attributes/segments, and an admin UI with logos.

### 3. Newsroom Image Downloader
Admin UI for downloading external images into your WordPress media library. Scans posts for external image URLs, imports them locally, and replaces URLs in post content.

### 4. Discord Polling Bot
Zero-dependency Node.js bot that polls your WordPress for new rolling coverage entries, newsletters, and events, then posts rich embeds to Discord channels.

### 5. Discord Bot WordPress API
REST API plugin that exposes endpoints for the Discord bot to query: rolling coverage entries, published newsletters, content events, and health checks.

### 6. Strip Externals Script
Shell script that removes external service dependencies from Newpack plugins:
- ESP providers (Mailchimp, ActiveCampaign, etc.)
- Google OAuth / GA4 analytics
- Meta Pixel / Twitter Pixel
- Salesforce CRM
- reCAPTCHA
- Nextdoor syndication
- External webhooks

## Install

```bash
# 1. Install Newpack plugins first
# 2. Strip external dependencies (run once)
bash newspack-strip-externals/strip-externals.sh /path/to/wp-content/plugins

# 3. Copy plugins to WordPress
cp -r newsroom-speed-cache /path/to/wp-content/plugins/
cp -r newspack-local-esps /path/to/wp-content/plugins/
cp -r newsroom-image-downloader /path/to/wp-content/plugins/
cp -r newpack-discord-bot-api /path/to/wp-content/plugins/

# 4. Activate in WordPress admin

# 5. Deploy Discord bot (optional)
cd discord-bot && cp .env.example .env && docker-compose up -d
```

## Requirements

- WordPress 6.0+
- PHP 7.4+
- Newpack plugins (newspack-plugin, newspack-newsletters, etc.)
- Object cache backend (Memcached, Redis, or APCu) for Speed Cache
- Node.js 18+ for Discord bot
- Docker (optional, for Discord bot)

## License

GPL-2.0-or-later

