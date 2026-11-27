# AGENTS.md

## Project state

- Laravel 13 / PHP 8.5. The implemented app is a small **inventory CRUD** (`products`, `stocks`, `transactions`) wired in `routes/web.php`; there is no `/` route.
- `agent/` contains the spec for a **different, not-yet-built** app: BK - Bengkel Ku, a motorcycle-service queue system. It does not describe the current code.
- No auth/login scaffolding or auth middleware exists yet; `users` is stock (no `role` or `username` column).
- Do not delete or replace the inventory CRUD for BK work without explicit user confirmation.

## Spec workflow

- Read `agent/prd.md` and `agent/desain.md` before BK work. The task doc says `design.md` and `.agents/`, but the real paths are `agent/desain.md` and `agent/`; `.agents/` and `Dockerfile` do not exist.
- `agent/task-instruction.md` requires updating `.agents/tasklist.md` after each task (`[x] ✅`, progress %, files changed). Create it if missing.
- BK constraints: Bootstrap 5 UI, MySQL, Indonesian copy, roles Petugas/Pemilik. Pemilik is read-only and must be blocked server-side on create/edit/delete/status routes, not just by hiding buttons. Queue numbers (`A-001`) are unique per service date and assigned after a successful save.

## Commands

- `composer setup` — one-shot install: Composer deps, `.env`, key, migrate, `npm install`, build.
- `composer dev` — runs `php artisan dev` (serve + queue listener + Vite). Prefer it over bare `php artisan serve` when queue/Vite matter. `node_modules/` is absent; run `npm install` first.
- `php artisan test` (or `composer test`, which clears config first). Single test: `php artisan test --filter=ExampleTest`.
- `php vendor/bin/pint` — only formatter; `--test` checks without writing. No `pint.json`, lint script, or CI.
- `php artisan migrate` / `migrate:fresh --seed`.

## Environment

- `.env` (gitignored) uses MySQL `rekayasa_web3` on `127.0.0.1:3306`; XAMPP MySQL must be running. Migrations are already applied; `composer setup` will not create the database.
- App timezone is UTC; confirm the workshop's timezone before implementing per-date queue numbering.
- `phpunit.xml` forces SQLite `:memory:` for tests, so tests never touch MySQL. DB-backed tests need `RefreshDatabase` or the tables won't exist.
- `.env.example` is stock SQLite; don't use it to infer the local MySQL setup.
- Pre-existing failure: `tests/Feature/ExampleTest.php` expects `GET /` → 200, but no `/` route exists (404). Don't attribute it to your change.
- `.npmrc` sets `ignore-scripts=true` and `composer setup` passes `--ignore-scripts`; npm lifecycle scripts will not run.

## Code quirks

- FK column is **`id_products`** (plural), not `product_id`; relationships pass it explicitly (`Product::stocks()`, `Stock::product()`).
- Existing CRUD is not a pattern to copy: controllers use `$request->all()` with **no validation**, and resource routes expose `show` while controllers have no `show()` (500 if hit). Add validation and implement or exclude `show`.
- Single Blade layout: `resources/views/layout.blade.php`, used via `@extends('layout')`. It hardcodes inventory branding and inline CSS; there is no `layouts/` directory.
- Tailwind 4/Vite are installed, but `resources/css/app.css` and `resources/js/app.js` are scaffold-only and the layout never calls `@vite`. Follow the design doc's Bootstrap 5 approach for BK; don't mix Tailwind into Bootstrap pages.

## Ignore

- `README.md` is the stock Laravel README.
- `CLAUDE.md` is a stale copy of the Laravel Boost bootstrap; ignore its install-Boost instructions (Boost is not installed). This file is authoritative.
