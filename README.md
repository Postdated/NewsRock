# Newspack Newsroom Suite

A complete local-first newsroom toolkit for WordPress. The full Newpack source plus 6 custom plugins, optimized for local operation with zero external dependencies.

## Repository Structure

### Original Newpack Plugins (source for redevelopment)
Located in `newspack-originals/`:
- `newspack-plugin` — Core plugin (reader activation, content gating, metered paywall, bylines)
- `newspack-newsletters` — Newsletter composer, tracking, subscriber management
- `newspack-ads` — Ad placements, Broadstreet/GAM providers
- `newspack-blocks` — Gutenberg blocks (post grids, carousels, author lists)
- `newspack-rolling-coverage` — Live coverage, Slack integration, social sharing
- `newspack-sponsors` — Sponsor management
- `newspack-story-budget` — Editorial calendar and story budget
- `newspack-popups` — Inline/overlay popups with targeting
- `newspack-post-image-downloader` — CLI image importer
- `newspack-revisions-enhanced` — Enhanced revision tracking
- `newspack-cache-cozy` — Caching utilities
- `newspack-elections` — Election results blocks
- `newspack-multibranded-site` — Multi-brand management

### Custom Plugins (built for this project)
- **newsroom-speed-cache/** — Object cache wrapper for Newpack hot paths (Memcached/Redis/APCu)
- **newspack-local-esps/** — 11 email service providers hooked into Newpack (SES, Resend, Plunk, Elastic Email, Mailgun, Mailtrap, Mail250, BillionMail, Mautic, Listmonk, SMTP)
- **newsroom-image-downloader/** — Admin UI for downloading external images to media library
- **newpack-discord-bot-api/** — REST API for Discord polling bot
- **discord-bot/** — Zero-dependency Node.js Discord bot
- **newspack-strip-externals/** — Shell script to remove external dependencies from Newpack

## What Gets Stripped

The `strip-externals.sh` script removes:
- ESP providers (Mailchimp, ActiveCampaign, Campaign Monitor, Constant Contact, Letterhead)
- Google OAuth / GA4 analytics
- Meta Pixel / Twitter Pixel tracking
- Salesforce CRM sync
- reCAPTCHA
- Nextdoor syndication
- External webhooks
- Starter content (WordPress.org API)

## What Runs Locally

After stripping, everything runs on your server:
- ✅ Content gating and metered paywall (cookie + user meta)
- ✅ Open/click tracking (pixel + redirect through your server)
- ✅ Newsletter composer (Gutenberg-based, MJML rendering)
- ✅ Subscriber management (local My Account page)
- ✅ Object caching (Memcached/Redis/APCu)
- ✅ Image importing (admin UI, sideload to media library)
- ✅ Discord notifications (polling bot)
- ✅ Ad management (Broadstreet)
- ✅ Rolling coverage (Slack kept, Discord added)
- ✅ Bylines, authors, sponsors, story budget, revisions

## Install

```bash
# 1. Clone this repo
git clone https://github.com/Postdated/Newspack.git

# 2. Copy Newpack originals to WordPress and extract
cp newspack-originals/*.zip /path/to/wp-content/plugins/
cd /path/to/wp-content/plugins/
for z in newspack-*.zip; do unzip -o "$z"; done

# 3. Strip external dependencies (run once)
bash /path/to/Newspack/newspack-strip-externals/strip-externals.sh /path/to/wp-content/plugins

# 4. Copy custom plugins
cp -r /path/to/Newspack/newsroom-speed-cache /path/to/wp-content/plugins/
cp -r /path/to/Newspack/newspack-local-esps /path/to/wp-content/plugins/
cp -r /path/to/Newspack/newsroom-image-downloader /path/to/wp-content/plugins/
cp -r /path/to/Newspack/newpack-discord-bot-api /path/to/wp-content/plugins/

# 5. Activate all in WordPress admin

# 6. Deploy Discord bot (optional)
cd /path/to/Newspack/discord-bot && cp .env.example .env && docker-compose up -d
```

## Requirements

- WordPress 6.0+
- PHP 7.4+
- Object cache backend (Memcached, Redis, or APCu)
- Node.js 18+ (for Discord bot)
- Docker (optional, for Discord bot)

## License

GPL-2.0-or-later

