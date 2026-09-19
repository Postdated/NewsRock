# NewsRock

Mono repo of [Newspack](https://github.com/Postdated/Newspack) for Bedrock, [NewsWoo](https://github.com/Postdated/NewsWoo) the WooCommerce fork for newsrooms, and NewsDesk the Newspack theme built for Bedrock and Sage.

## Repository Structure

```
NewsRock/
├── newswoo/          → NewsWoo — lean WooCommerce fork for newsrooms
│   ├── assets/       → Logos, fonts (Inter, WooCommerce icon font)
│   ├── .github/      → Issue templates (bug, feature, stripping, compat, newspack)
│   ├── dev/          → Development environment docs
│   ├── CODE_ANALYSIS.md
│   ├── ROADMAP.md
│   └── README.md
├── newspack/         → (planned) Newspack Bedrock distribution
├── newsdesk/         → (planned) NewsDesk theme for Bedrock + Sage
├── scripts/          → Monorepo sync and utility scripts
└── README.md
```

## Components

### NewsWoo
A lean, purpose-built fork of WooCommerce designed as a drop-in replacement for Newspack Bedrock. Stripped of retail bloat (shipping, inventory, complex product types) and optimized for digital subscriptions, paywall access, and reader donations.

- **Source:** [Postdated/NewsWoo](https://github.com/Postdated/NewsWoo)
- **Docs:** [newswoo/README.md](newswoo/README.md)
- **Roadmap:** [newswoo/ROADMAP.md](newswoo/ROADMAP.md)
- **Analysis:** [newswoo/CODE_ANALYSIS.md](newswoo/CODE_ANALYSIS.md)

### Newspack Bedrock (planned)
The Newspack distribution running on Roots Bedrock + Acorn.

- **Source:** [Postdated/Newspack](https://github.com/Postdated/Newspack)

### NewsDesk (planned)
The Newspack theme built for Bedrock and Sage.

## Syncing

Changes to NewsWoo are synced to this monorepo via the sync script:

```bash
# From the NewsWoo repo directory:
./scripts/sync-to-monorepo.sh

# Or from this monorepo:
./scripts/pull-from-newswoo.sh
```

See [scripts/README.md](scripts/README.md) for details.

## License

GPL-2.0-or-later

