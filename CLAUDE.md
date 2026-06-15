# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Frontend (Vite)
npm run dev                  # Vite dev server with HMR for resources/css + resources/js
npm run build                # Production asset build

# Gutentap (custom Nova field, see below) — its assets build separately
npm run build-gutentap       # Dev build of the Gutentap Nova field
npm run build-gutentap-prod  # Production build of the Gutentap Nova field

# PHP / Laravel
php artisan ...               # Standard Artisan commands
php artisan sitemap:generate  # Regenerate sitemap (App\Console\Commands\GenerateSitemap; runs daily via scheduler)
./vendor/bin/pint             # Code style (Laravel Pint)

# Tests (PHPUnit, configured in phpunit.xml — Unit + Feature suites)
php artisan test                          # Run all tests
php artisan test --testsuite=Feature      # One suite
php artisan test --filter=SomeTest        # A single test class/method
```

This is a Laravel 10 / PHP 8 app. Admin uses **Laravel Nova 4** (licensed; pulled from `nova.laravel.com`). Several Composer dependencies come from private/forked VCS repos (`whitecube/nova-flexible-content`, `outl1ne/nova-media-hub`, `jdp/gutentap` as a local path package under `nova-components/`), so `composer install` requires SSH access to those GitHub repos.

## Architecture

This is the marketing/content site for Joy of Languages. There is **no public-facing API or SPA** — it is server-rendered Blade. Content is authored entirely through Nova and stored as structured "flexible content" JSON.

### Multilingual subdomain routing

Each language lives on its own subdomain (e.g. `italian.joyoflanguages.com`). In `routes/web.php`, the main route group is wrapped in `Route::domain("{language:slug}." . <app host>)`, so `Language` is resolved by subdomain slug and injected into controllers. Routes without a language (bare host) also exist as fallbacks, and `PageController`/`PostController` redirect bare-host hits to the correct language subdomain when the content belongs to a language. Page slugs are matched with `->where("page", "^(?!nova).*")` to avoid shadowing the Nova admin under `/nova`.

### Page → Template → Flexible Layout → Blade (the core content pattern)

A `Page` has a `template` column holding a Nova template **class name** (e.g. `App\Nova\Templates\HomePageTemplate`). Understand these three layers together:

1. **Templates** (`app/Nova/Templates/`, registered in `config/page-templates.php`) — plain classes (not Eloquent) that declare:
   - `fields()`: which Flexible **layouts** are offered in the Nova editor for this page type.
   - `name()`: the Blade view under `resources/views/templates/` to render (e.g. `home-page` → `templates/home-page.blade.php`).
   - `label()` / `unique()`: display name and whether only one page may use this template.
   - `Page::getAvailableTemplates()` filters out `unique()` templates already in use.

2. **Flexible content** — the `Page.content` column is cast by `app/Casts/MyFlexibleCast.php`, which maps each layout's string `name` (e.g. `"hero"`) to a Layout class in `app/Nova/Flexible/Layouts/`. **When you add a new Layout you must register it in BOTH** the relevant Template's `fields()` (so editors can add it) **and** `MyFlexibleCast::$layouts` (so it deserializes on the front end).

3. **Rendering** — template Blade views iterate `$page->content` and `@include('flexible.' . $layout->name())`, so each Layout `name` maps to a view in `resources/views/flexible/`. The controller calls `$page->resolveContent()` which instantiates the template and resolves the flexible content before passing it to the view.

So a new content block touches four places: the Layout class, an entry in `MyFlexibleCast`, the Template `fields()` it should appear in, and a `resources/views/flexible/<name>.blade.php`.

### Gutentap — custom WYSIWYG Nova field

`nova-components/Gutentap` is a self-contained Nova field package (`jdp/gutentap`, a TipTap-based block editor) included as a Composer path repo with its own `package.json`/webpack build (hence the separate `build-gutentap` scripts). Its TipTap node output is rendered to HTML via Blade partials in `resources/views/blocks/` (`paragraph`, `heading`, `image`, `table`, etc.).

### Models

`Page`, `Post`, `Podcast`, `User` all `belongTo` `Language`. `Page` is self-referential (`parent_id`) to form a hierarchy; `getURLAttribute()` builds the full `https://<lang>.host/<nested-slug>` URL by walking parents, and `scopeOrderPagesByUrl()` orders pages by computed URL for the Nova index. Image columns use `App\Casts\NovaMediaLibraryCast` (backed by outl1ne nova-media-hub).

### Background jobs

`app/Jobs/`: `FetchWordpress` and `FetchPodcasts` import external content; `EncodeVideo` / `SaveAndResizeVideo` (and image resize actions in `app/Nova/Actions/`) use `pbmedia/laravel-ffmpeg`. The scheduler (`app/Console/Kernel.php`) currently only runs `sitemap:generate` daily.

### Front-end stack

Blade + **Alpine.js** + Tailwind (config in `tailwind.config.cjs`, with `tailwind.safelist.txt`). Vue 3 is used only for isolated interactive components (`resources/js/components/teammap.vue`, Leaflet map). Swiper for carousels. Full-page output is cached with `spatie/laravel-responsecache`.

## Conventions

- PHP formatting is enforced by **Laravel Pint**; JS/Blade by Prettier (`.prettierrc.json`, with `@shufo/prettier-plugin-blade`). Run these rather than hand-formatting.
- Clockwork and `spatie/laravel-ray` are available for local debugging.
