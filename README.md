<p align="center">
  <img src="https://img.shields.io/badge/WordPress-6.0%2B-blue?logo=wordpress&logoColor=white" alt="WordPress 6.0+">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white" alt="PHP 7.4+">
  <img src="https://img.shields.io/badge/Node.js-18%2B-339933?logo=node.js&logoColor=white" alt="Node.js 18+">
  <img src="https://img.shields.io/badge/Docker-optional-2496ED?logo=docker&logoColor=white" alt="Docker">
  <img src="https://img.shields.io/badge/License-GPL--2.0--or--later-brightgreen" alt="License GPL-2.0-or-later">
  <img src="https://img.shields.io/badge/Package-Newspack%20Bedrock%20v1.0.0-orange" alt="Newspack Bedrock v1.0.0">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Memcached-supported-00B8D9?logo=memcached&logoColor=white" alt="Memcached">
  <img src="https://img.shields.io/badge/Redis-supported-DC382D?logo=redis&logoColor=white" alt="Redis">
  <img src="https://img.shields.io/badge/APCu-supported-5B6770" alt="APCu">
  <img src="https://img.shields.io/badge/MySQL/MariaDB-required-4479A1?logo=mysql&logoColor=white" alt="MySQL/MariaDB">
  <img src="https://img.shields.io/badge/Composer-required-885630?logo=composer&logoColor=white" alt="Composer">
  <img src="https://img.shields.io/badge/WP--CLI-supported-1B8C3D" alt="WP-CLI">
</p>

# Newspack Bedrock v1.0.0

A local-first newsroom publishing platform for WordPress. Built on top of [Automattic's Newspack ecosystem](https://github.com/Automattic/newspack-plugin), extended with 6 custom plugins for zero-dependency operation, optimized performance, and self-hosted email delivery.

> **This project is adapted from [Automattic/newspack-workspace](https://github.com/Automattic/newspack-workspace).** All credit for the core Newspack plugins, architecture, and editorial tooling goes to the [Automattic Newspack team](https://newspack.com/). This fork adds local-first email delivery, object caching, image importing, and Discord integration on top of their work.

---

## Credits & Attribution

| Component | Author | License |
|---|---|---|
| [newspack-plugin](https://github.com/Automattic/newspack-plugin) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-newsletters](https://github.com/Automattic/newspack-newsletters) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-blocks](https://github.com/Automattic/newspack-blocks) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-ads](https://github.com/Automattic/newspack-ads) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-rolling-coverage](https://github.com/Automattic/newspack-rolling-coverage) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-sponsors](https://github.com/Automattic/newspack-sponsors) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-story-budget](https://github.com/Automattic/newspack-story-budget) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-popups](https://github.com/Automattic/newspack-popups) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [newspack-post-image-downloader](https://github.com/Automattic/newspack-post-image-downloader) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [co-authors-plus](https://github.com/Automattic/Co-Authors-Plus) | [Automattic](https://github.com/Automattic) | GPL-2.0-or-later |
| [Flux Media Optimizer](https://fluxplugins.com) | Flux Media | GPL-2.0-or-later |
| [FIFU Premium](https://fifu.app) | FIFU | GPL-2.0-or-later |

Custom plugins in this repository are also GPL-2.0-or-later.

---

## Technologies

| Layer | Technology |
|---|---|
| **CMS** | WordPress 6.0+ |
| **Language** | PHP 7.4+ (8.3 recommended) |
| **Database** | MySQL / MariaDB |
| **Object Cache** | Memcached, Redis, or APCu |
| **Package Manager** | Composer (PHP), pnpm (JS, for development) |
| **CLI** | WP-CLI |
| **Containerization** | Docker + Docker Compose (optional) |
| **Email Delivery** | SMTP, Amazon SES, Resend, Plunk, Elastic Email, Mailgun, Mailtrap, Mail250, BillionMail, Mautic, Listmonk |
| **Image Processing** | GD, Imagick, FFmpeg (server-side, via Flux) |
| **Bot Runtime** | Node.js 18+ (Discord polling bot) |
| **Caching Strategy** | wp_cache_* abstraction (backend-agnostic) |
| **Testing** | Playwright (E2E), PHPUnit |
| **Local Dev** | Docker Compose with Apache, MySQL, Memcached, MailHog, Adminer |

---

## Repository Structure

```
newspack-bedrock/
├── newspack-originals/              ← Source plugins (zips) for redevelopment
│   ├── newspack-plugin.zip              Core: gating, metering, bylines, reader activation
│   ├── newspack-newsletters.zip         Newsletter composer, tracking, ESP sync
│   ├── newspack-ads.zip                 Ad placements, Broadstreet
│   ├── newspack-blocks.zip              Gutenberg blocks
│   ├── newspack-rolling-coverage.zip    Live coverage, Slack integration
│   ├── newspack-sponsors.zip            Sponsor management
│   ├── newspack-story-budget.zip        Editorial calendar
│   ├── newspack-popups.zip              Targeted popups
│   ├── newspack-post-image-downloader.zip  CLI image importer
│   ├── newspack-revisions-enhanced.zip  Enhanced revision tracking
│   ├── newspack-cache-cozy.zip          Caching utilities
│   ├── newspack-elections.zip           Election results blocks
│   ├── newspack-multibranded-site.zip   Multi-brand management
│   ├── co-authors-plus.zip              Multiple authors per post
│   ├── fifu-premium.zip                 Featured Image from URL, video thumbnails
│   └── flux-media-optimizer.zip         Image/video optimization (local GD/Imagick/FFmpeg)
│
├── newsroom-speed-cache/            ← Object cache wrapper (Memcached/Redis/APCu)
├── newspack-local-esps/             ← 11 email providers for Newpack Newsletters
├── newsroom-image-downloader/       ← Admin UI for image importing
├── newpack-discord-bot-api/         ← REST API for Discord polling bot
├── discord-bot/                     ← Zero-dependency Node.js Discord bot
└── newspack-strip-externals/        ← Hardening scripts
    ├── strip-externals.sh               Remove external dependencies from Newpack
    └── harden-dependencies.sh           Null Flux API, strip TranslatePress telemetry
```

---

## What Gets Stripped

`strip-externals.sh` removes from the original Newpack plugins:

- ESP providers (Mailchimp, ActiveCampaign, Campaign Monitor, Constant Contact, Letterhead)
- Google OAuth / GA4 analytics
- Meta Pixel / Twitter Pixel tracking
- Salesforce CRM sync
- reCAPTCHA
- Nextdoor syndication
- Starter content (WordPress.org API)
- External webhooks

`harden-dependencies.sh` nullifies:

- Flux Media Optimizer external API (api.fluxplugins.com) — license checks disabled, local GD/Imagick/FFmpeg processing untouched

---

## What Runs Locally

After hardening, everything runs on your server:

| Feature | How It Works |
|---|---|
| Content gating & metered paywall | Cookie + user meta, no external tracking |
| Open/click tracking | 1x1 pixel served from your server, link redirect through your server |
| Newsletter composer | Gutenberg-based, MJML rendering, local CPT |
| Subscriber management | Local My Account page, wp_options storage |
| Object caching | wp_cache_* → Memcached/Redis/APCu |
| Image importing | Admin UI, sideload to media library |
| Image optimization | Flux local processing via GD/Imagick/FFmpeg |
| Video thumbnails | FIFU workers (oembed-youtube.fifu.app, oembed-vimeo.fifu.app) |
| Discord notifications | Node.js polling bot, Discord webhooks |
| Ad management | Broadstreet (requires API key) |
| Rolling coverage | Slack (kept), Discord (added) |
| Multi-author bylines | Co-Authors Plus + Newpack Bylines |
| Editorial calendar | Story budget, revision tracking |

---

## Install

```bash
# 1. Clone this repo
git clone https://github.com/Postdated/Newspack.git
cd Newspack

# 2. Extract Newpack originals + dependencies to WordPress
for z in newspack-originals/*.zip; do
  unzip -o "$z" -d /path/to/wp-content/plugins/
done

# 3. Strip external dependencies (run once)
bash newspack-strip-externals/strip-externals.sh /path/to/wp-content/plugins

# 4. Harden dependency plugins (run once)
bash newspack-strip-externals/harden-dependencies.sh /path/to/wp-content/plugins

# 5. Install custom plugins
cp -r newsroom-speed-cache /path/to/wp-content/plugins/
cp -r newspack-local-esps /path/to/wp-content/plugins/
cp -r newsroom-image-downloader /path/to/wp-content/plugins/
cp -r newpack-discord-bot-api /path/to/wp-content/plugins/

# 6. Activate all in WordPress admin

# 7. Deploy Discord bot (optional)
cd discord-bot && cp .env.example .env && docker-compose up -d
```

---

## Packaging

This project is packaged as **Newspack Bedrock** with semantic versioning.

| Field | Value |
|---|---|
| Package name | `Newspack Bedrock` |
| Version format | `vMAJOR.MINOR.PATCH` (e.g. `v1.0.0`) |
| Current version | `v1.0.0` |
| Tag format | `newspack-bedrock-v1.0.0` |

To create a release:

```bash
# Tag the release
git tag -a newspack-bedrock-v1.0.0 -m "Newspack Bedrock v1.0.0"

# Push the tag
git push origin newspack-bedrock-v1.0.0

# Create GitHub release
gh release create newspack-bedrock-v1.0.0 --title "Newspack Bedrock v1.0.0" --notes "Initial release"
```

---

## Requirements

- WordPress 6.0+
- PHP 7.4+ (8.3 recommended)
- MySQL 5.7+ / MariaDB 10.3+
- Object cache backend (Memcached, Redis, or APCu) for Speed Cache
- Node.js 18+ (for Discord bot)
- Docker + Docker Compose (optional, for local dev and Discord bot)
- Composer (for dependency management)

---

## License

GPL-2.0-or-later. See [LICENSE](LICENSE) for details.

This project contains code from [Automattic/newspack-workspace](https://github.com/Automattic/newspack-workspace) and related Automattic Newspack repositories, all licensed under GPL-2.0-or-later.

