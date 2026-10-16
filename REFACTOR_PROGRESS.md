# Narra — Blade Componentization & CSS Refactor

Status: **Batch 4 complete** (safe, non-functional cleanup). Batches 1–3 migrated all views to the
shared components; the remaining items under "Not yet touched" are optional/out of scope.
All work is additive-first: original markup is preserved in git history
(`git checkout <file>` restores any pre-migration version). Nothing was deleted without a
verified replacement.

## Verification method

Before overwriting any view, it is rendered to HTML with a throw-away harness
(`/tmp/opencode/render.php`) that boots the app, injects a fake `super_admin`, fakes a matched
route (so `request()->routeIs()` and `@can` behave), and passes sample collections. The baseline
is saved, the view migrated, then both are re-rendered and diffed with whitespace normalised.

Supporting tools (all under `/tmp/opencode`, outside the repo):
- `migrate.php <view> [title] [--dry]` — mechanical migration: extracts `title`, inline `<style>`,
  the `<main class="main-wrapper">` body, any leading `@php` block, and inline `<script>`s; removes
  CSS rules that are byte-identical (selector + declarations + media) to a rule in
  `public/css/admin.css`; rewrites the view as `<x-admin.layout>…` with `@push('styles'|'scripts')`.
  **Only removes CSS when an identical rule already exists in `admin.css`, so appearance is
  preserved.**
- `verify_css.php <baseline.html> <new.html>` — asserts every baseline CSS rule still exists in
  `admin.css` ∪ the migrated page.
- `verify_css_any.php <baseline.html> <new.html> [css file]` — same check, parameterised stylesheet
  (used for `public.css` / `auth.css` + `error.css` in Batch 3).
- `migrate_public.php <view> [--dry]` — mechanical public-page migration: extracts `title`, the
  page-specific `<head>` assets (Google Fonts, Turnstile), the inline `<style>` (reduced against
  `public.css`), and the `<main>` body; rewrites the view as `<x-public.layout>` with
  `@push('head'|'styles')`. `<main>` markup is copied verbatim; the footer block is swapped for
  `<x-public.footer>` (dedicated pages) or dropped (listings, where the layout renders it).
- `conflicts.php <html> <admin.css>` — reports `admin.css` selectors that would newly apply to a
  page (class used by the page but not defined by it), to catch cross-page style leaks.

Commands used:
- `php artisan view:cache` — compiles every Blade template (syntax gate). Passes.
- `php /tmp/opencode/render.php <base> <view> <routeName>` — per-page render + diff.
- `php artisan test` — temporary feature test (removed after running) on in-memory SQLite.

## Batch 1 deliverables

### New shared guest/public stylesheet
- `public/css/public.css`
  - `:root` brand vars (`--bs-primary`, `--bs-primary-hover`) and shared neutral palette.
  - Base `body` (font via `--narra-font-sans`, colour via `--narra-body-color`,
    background via `--narra-body-bg`) — values preserve the per-page originals.
  - Navbar (`.navbar`, `.navbar-brand`, `.nav-link`, active/hover, responsive).
  - Public page header (`.page-header`, `.category-label`, `.page-title`).
  - `.empty-state`.
  - Inner footer (`.footer-divider`, `.footer-brand`, `.copyright-text`).

### New guest/public components (`resources/views/components/public/`)
- `layout.blade.php` — HTML shell; props `title`, `active`, `navbarVariant`
  (`inner|landing`), `container`, `footer`. Loads Bootstrap 5.3.3 + icons + `public.css`,
  renders navbar and (optionally) footer, exposes `@stack('head'|'styles'|'scripts')`.
- `navbar.blade.php` — single nav definition with `inner` (cross-page route links) and
  `landing` (in-page `#hash` anchors, as used by the homepage) variants.
- `footer.blade.php` — the simple inner-page footer (brand + copyright).

### New admin stylesheet
- `public/css/admin.css` — centralises the duplicated admin chrome and feature styles:
  `:root` vars, `body`, sidebar, brand, nav links, admin profile, logout, mobile navbar,
  main wrapper, page title/subtitle, add-buttons, search, table, actions, empty state,
  pagination, form card, form controls, buttons, and all responsive breakpoints.

### New admin components (`resources/views/components/admin/`)
- `layout.blade.php` — HTML shell; props `title`, `brandHref`. Loads Bootstrap 5.3.3 + icons +
  Plus Jakarta Sans + `admin.css`; renders sidebar, mobile nav and `<main class="main-wrapper">`;
  exposes `@stack('styles'|'scripts')`.
- `nav.blade.php` — single source of truth for the admin navigation. Includes **Product** on
  every page, and gates **Akun** behind `@can('manage-admins')`. Active state derived from
  `request()->routeIs(...)`.
- `profile.blade.php` — avatar + name/role + logout form.
- `sidebar.blade.php` — desktop sidebar (brand + nav + profile); prop `brandHref`.
- `mobile-nav.blade.php` — mobile navbar (brand + toggler + collapsible nav + profile);
  prop `brandHref`.

### Migrated views (Batch 1)
- `resources/views/newsdir/index.blade.php` — now uses `<x-admin.layout>`; shared CSS removed,
  only news-list/empty/pagination tweaks kept in `@push('styles')`.
- `resources/views/dedicatedpage/news/index.blade.php` — now uses `<x-public.layout>`; shared
  navbar/footer/page-header/empty-state removed, only news-card styles kept.
- `resources/views/welcome.blade.php` — now uses `<x-public.layout>` (`landing` variant,
  `:container="false"`, `:footer="false"`); navbar + shared CSS removed, landing sections and the
  contact footer kept inline; fonts/scripts moved to stacks. Appearance preserved.

## Batch 2 deliverables

Every remaining admin view now uses `<x-admin.layout>`; the duplicated `<head>`, sidebar, mobile
navbar and profile markup is gone, and any CSS rule already present verbatim in `admin.css` was
removed from the page. Only genuinely page-specific CSS/JS remains in `@push('styles'|'scripts')`.

Migrated views:
- `admindir/{index,create,edit}.blade.php`
- `dashboard.blade.php`
- `gallerydir/{index,create,edit}.blade.php`
- `inboxdir/{index,create,edit}.blade.php`
- `productdir/{index,create,edit}.blade.php`
- `ratingdir/{index,create,edit}.blade.php`

### Layout enhancement
- Added a `brandHref` prop to `x-admin.layout` (forwarded to `x-admin.sidebar` and
  `x-admin.mobile-nav`) so each page keeps its original brand target. Most pages used
  `url('/')`; `newsdir/index`, `ratingdir/create`, `ratingdir/edit` used `route('dashboard')`.

### Dashboard specifics
- The inline `@php` block (`use` imports + `News/Gallery/Inbox/Rating` counts + auth user) was
  moved to the **top of the file, before `<x-admin.layout>`**. It cannot live inside a component
  slot: `use` statements compile inside a conditional context and cause a PHP parse error there.
  No query/business logic changed.
- The dashboard's `.message-text` class was renamed to `.dashboard-message-text` (CSS + 2 usages)
  to avoid colliding with `admin.css`'s table `.message-text` (which carries `max-width`
  truncation). This was the only **visible** cross-page leak found.

## Batch 3 deliverables

### Part A — remaining public pages (light theme)
All three now use `<x-public.layout>`; the duplicated `<head>` (fonts/Bootstrap/icons), navbar and
footer markup is gone, and any CSS rule already present verbatim in `public.css` was removed.

- `dedicatedpage/gallery/index.blade.php` — listing; layout default container + footer.
- `dedicatedpage/news/dedicated.blade.php` — detail; `:container="false" :footer="false"`, keeps its
  own `<main class="container my-3 my-md-4">` and places `<x-public.footer />` inside it.
- `dedicatedpage/gallery/dedicated.blade.php` — same structure as the news detail.

The page `<main>` bodies were copied **verbatim** by the migration script (no manual transcription),
so article/gallery markup, image handling (`asset('storage/…')`), `nl2br`, back-links and internal
links are byte-identical. Fonts (and the news page's Cloudflare Turnstile script) move to
`@push('head')`; page CSS stays in `@push('styles')`.

Enhancement: `x-public.footer` gained an optional `copyright` prop (default = the standard
`© <year> Narra. …undang-undang.`). The newsletter's gallery **detail** page historically omitted the
trailing period, so it passes the period-less text to preserve the original exactly.

### Part B — royal-blue auth/error layout (distinct theme)
New shared stylesheets:
- `public/css/auth.css` — chrome shared by login **and** the error pages: `:root` (`--royal-blue`,
  `--royal-blue-hover`, `--text-light-subtle`), `*`, `html,body`, base `body`, transparent navbar
  (`.navbar`, `.navbar-brand`, `.nav-link`, hover), footer (`.footer-divider`, `footer`,
  `.footer-brand`, `.copyright-text`) and the mobile `.navbar` padding.
- `public/css/error.css` — error-only styles (loaded **after** `auth.css`, by the error pages only,
  so nothing leaks into login): `.navbar-toggler`, `.error-container/-code/-title/-description`,
  `.btn-home`, and the error mobile rules (incl. the mobile `.navbar-brand` size and
  `.nav-link { padding: .65rem 0 !important }`, which login must not inherit).

New components:
- `components/public/auth-layout.blade.php` — shell; props `title`, `majorsLabel`, `majorsHref`.
  Loads Plus Jakarta Sans + Bootstrap 5.3.3 + icons + `auth.css`; renders
  `x-public.auth-navbar`, the slot, then `x-public.auth-footer`; exposes `@stack('head'|'styles'|'scripts')`.
- `components/public/auth-navbar.blade.php` — the 7 transparent links (Home, About, Majors, News,
  Gallery, Rating, Contact). `majorsLabel`/`majorsHref` default to `Majors` / `/#programs`; login
  passes `Major` / `/#progrms` (its historical label + typo), so each page keeps its exact links.
- `components/public/auth-footer.blade.php` — transparent footer (brand + copyright).
- `components/public/error-content.blade.php` — shared `<main>` + error code/title/description +
  "Kembali ke Beranda" button (props `code`, `title`, `description`).

Migrated views:
- `auth/login.blade.php` — `<x-public.auth-layout>` with `majors-label="Major"` /
  `:majors-href="url('/#progrms')"`; only the login form/session/remember/validation/button CSS
  remains page-specific (plus `body { justify-content: space-between }`).
- `errors/404.blade.php` / `errors/500.blade.php` — `<x-public.auth-layout>` + a shared
  `<x-public.error-content>`; each page only pushes `error.css` and passes its code/title/description.
  Error-page markup/CSS dropped from ~10 KB to ~4.5 KB each.

## Batch 4 deliverables (safe, non-functional cleanup)

### Audit method
- New helper `/tmp/opencode/css_audit.php` — for a stylesheet, extracts every class selector
  (including inside `@media`) and flags one as a **candidate-dead** rule only if **none** of its
  class tokens appears anywhere in the corpus. The corpus = every `.blade.php` file with its inline
  `<style>` blocks **stripped** (so a rule cannot count as its own usage) **plus** `resources/js/*.js`
  and `public/js/*.js` (catching JS/`querySelector` hooks). It also lists duplicate selectors.
- The same audit was run on **every** view's inline `<style>` block.
- Also checked: `@keyframes`, `animation*`, `@import`, `url()` across `public/css` + views.

### Findings & removals
- **Shared stylesheets** (`admin.css`, `public.css`, `auth.css`, `error.css`): **no** candidate-dead
  class selectors and **no** duplicate selectors. The admin table/list styles were already unified in
  Batch 2 (single `.table-card`/`.custom-table`/… definitions), so there was nothing further to
  consolidate.
- **No** `@keyframes`/animations/`@import`/`url()` exist in our CSS → nothing orphaned there.
- **Dead CSS removed (confirmed unreferenced):**
  - `resources/views/welcome.blade.php` — `.gallery-overlay` rule (no element uses the class;
    pre-existing in `HEAD`).
  - `resources/views/auth/login.blade.php` — `.remember-wrapper`, `.remember-label`,
    `.remember-checkbox` rules (login markup has no checkbox; pre-existing in `HEAD`).
- **Dead imports removed:** `routes/web.php` — `App\Http\Models\{News,Inbox,Gallery}` (that namespace
  does not exist) and `App\Models\Product`. All four aliases were verified unreferenced with a
  word-boundary scan; only their controller counterparts are used.

### Deliberately **kept** (not dead)
- Redundant-but-equivalent page rules such as `gallery/index`'s `.navbar` / `.nav-link` re-statements
  (they re-express shared values via `var()` and are not *unused*); removing them needs an
  equivalence proof and was judged out of scope for "confirmed-dead" cleanup.
- The Breeze/Tailwind stack (`@vite`, `resources/js`, `profile/edit`) is untouched and stays separate
  from the Bootstrap admin/public/royal-blue systems.

## Intended deltas (verified, non-visual or explicitly requested)

- Bootstrap `5.3.2` → `5.3.3` on the public listing page (welcome was already `5.3.3`;
  welcome is the declared source of truth).
- `aria-controls` / `aria-expanded` / `aria-label` added to the public navbar toggler.
- Admin sidebar/mobile nav now consistently show the **Product** link (was missing on some pages).
- Admin script/markup normalisation: inline search `<script>`s (previously rendered *after*
  `</html>` on several indexes) are now emitted before `</body>` via `@stack('scripts')`.
- Mobile nav Dashboard icon harmonised to `bi-grid-fill` (was `bi-grid` on mobile, `bi-grid-fill`
  on desktop — a pre-existing inconsistency).
- `--text-main` normalised to `#0f172a` in `admin.css`; pages that need a different value keep an
  in-page override (news index `#1e293b`, dashboard `#1e293b`), so appearance is unchanged.
- Brand-link target preserved per page via the new `brandHref` prop.
- Hover states supplied by `admin.css` now apply uniformly (e.g. `brand-logo:hover`,
  `nav-link-custom.active:hover`), which some pages (dashboard) previously lacked.

### Intended deltas (Batch 3)
- Bootstrap `5.3.2` → `5.3.3` on the two public detail pages, the gallery listing, login and both
  error pages (welcome was already `5.3.3`; it is the declared source of truth).
- Public navbar togglers now carry `aria-controls` / `aria-expanded` / `aria-label` (from the
  shared component).
- Shared `public.css` is now linked on the three public pages (previously page-local `<style>`).
- On the royal-blue pages, the error toggler is rendered with `border-0 text-white` (matching the
  original visual; `error.css` also sets the same border/colour/box-shadow, so appearance is equal).
- Cosmetic HTML comment removal (`<!-- Navbar -->`, `<!-- Footer -->`, `<!-- Login -->`,
  `<!-- 404/500 Content -->`, section banners) and attribute line-wrapping — no rendered change.

### Known minor side effects (Batch 3, accepted, non-visual)
- The news detail page's Cloudflare Turnstile `<script>` is emitted via `@stack('head')` (before the
  Bootstrap stylesheet) instead of after the icon stylesheet. It is an `async defer` script, so load
  order is unaffected.
- Multi-line text (error descriptions, the 404 copyright) is now emitted on one line; HTML collapses
  the whitespace, so the rendered text is identical.
- The dedicated pages keep a page-local `.footer-divider { margin-top: 4.5rem }` override (the
  shared `public.css` uses `4rem`), so their footer spacing is preserved. The gallery listing has no
  override (it used the shared `4rem`).
- The `:root`/`body` blocks of the migrated public/auth pages are now expressed through the shared
  variables (`public.css` / `auth.css`); `verify_css_any.php` flags these as "missing" only because
  the declarations were re-expressed (effective values identical). See the verification notes.

### Known minor side effects (accepted, non-visual or negligible)
- `productdir/edit` had an invalid `padding: … 1min` (typo) on `.mobile-menu`; browsers ignored it,
  so the mobile menu had no padding. `admin.css` now supplies the intended `1rem` bottom padding.
- `admindir/index` `.email-text` gains `font-size: 0.825rem` (from the shared rule); the page only
  overrode `color`.
- `ratingdir/index` `.date-text` gains `white-space: nowrap` (from the shared rule).
- `dashboard` `.action-link` merges `display: inline-flex; gap; transition` from the shared rule
  (it is a text-only link, so this is visually negligible).

## Verification results (Batch 2)

- `php artisan view:cache` — **passes**.
- All 17 admin views (16 CRUD + dashboard) render without error.
- Structure-only diffs (ignoring `<style>` internals) vs baselines show only the intended
  nav/CSS/normalisation changes — no content or form/route/CSRF/method changes.
- CSS-loss check: **every page passes with 0 missing rules** except:
  - `newsdir/index` (Batch 1 hand-migration): 4 "missing" rules are actually *split* across
    `admin.css` + an in-page override with the same effective result (`:root` text-main override,
    `.btn-add-news` declaration reorder, `.empty-state` padding + `text-align` split,
    `.pagination-wrapper` padding + `border-top` split).
  - `dashboard`: 1 "missing" rule is the intentional `.message-text` → `.dashboard-message-text`
    rename (declarations preserved verbatim).
- `conflicts.php` against migrated pages: no unintended leaks (remaining `admin.css` selectors are
  the shared chrome used by the sidebar/nav components).
- Live smoke test (`php artisan serve --port=8123`): `/login` 200, `/css/admin.css` 200,
  `/css/public.css` 200, `/admin` 302 (auth redirect), homepage references `public.css`.
- Temporary feature test (in-memory SQLite, removed after running): all admin pages returned 200,
  and a full create→edit→update→delete cycle passed for news, gallery, product, inbox, rating and
  admin management (37 assertions). Routes, authorization, validation and CSRF all exercised
  through the real controllers.

## Verification results (Batch 3)

- `php artisan view:cache` — **passes** (all new components + migrated views compile).
- Baselines captured with `/tmp/opencode/render.php` **before** migrating each of the 6 views
  (`dedicatedpage.news.dedicated`, `dedicatedpage.gallery.index`, `dedicatedpage.gallery.dedicated`,
  `auth.login`, `errors.404`, `errors.500`), then re-rendered after and diffed with whitespace
  normalised.
- Structure diffs (excluding `<style>` internals) show **only** the intended deltas: Bootstrap
  version, added `public.css`/`auth.css`/`error.css` links, shared navbar/footer markup (attribute
  wrapping + toggler `aria-*`), and comment normalisation. **No** changes to content, form
  `method`/`action`, `@csrf`, `old()`/`$errors`, image `src`, or link `href`s.
- Nav check: the light inner navbar links (Home / About / `/#programs` / `news` / `gallery` /
  `/#rating` / `/#contact`) are intact; login keeps `Major` → `/#progrms`; errors keep `Majors` →
  `/#programs`; the shared auth navbar's `News` still points at `/#news`.
- Copyright check: news detail and gallery listing keep the trailing period; **gallery detail keeps
  its period-less** text (verified in the rendered HTML).
- CSS-loss checks (`verify_css_any.php`):
  - `errors/404`, `errors/500` vs `auth.css` ∪ `error.css` — **all 29 baseline rules present**.
  - `auth/login` vs `auth.css` — 2 "missing": `:root` and `body`, which are intentionally *split*
    across `auth.css` + the page (input vars + `justify-content` in the page; the rest in
    `auth.css`). Effective declarations are identical.
  - public detail pages vs `public.css` — 2 "missing": `:root`/`body`, likewise re-expressed via
    shared vars (`--narra-font-sans`, `--narra-body-bg`, `--narra-body-color`) with identical
    effective values.
- Live smoke test (`php artisan serve --port=8899`):
  `/login` 200, `/news` 200, `/gallery` 200, `/news/1` 200, `/gallery/1` 200,
  `/css/public.css` 200, `/css/auth.css` 200, `/css/error.css` 200, missing URL → 404.
  The 404 response renders `error.css`, `error-code` and "Halaman Tidak Ditemukan"; `/login`
  renders `auth.css`, the CSRF token and `action="…/login"`.
- Full suite `php artisan test` — 22 passed, 3 failed. The 3 failures
  (`RegistrationTest` ×2 — `/register` is not routed; `ExampleTest` — `/` needs the `news` table)
  were re-confirmed **identical on a stashed/clean tree**, i.e. pre-existing and unrelated to this
  refactor. `AuthenticationTest` (login screen, authenticate, bad password, logout) passes fully.

## Verification results (Batch 4)

- `php artisan view:cache` — **passes** (after the removals).
- `php artisan test` — **22 passed, 3 failed** (59 assertions). The same 3 pre-existing failures as
  Batches 2–3 (`RegistrationTest` ×2 — `/register` is not routed; `ExampleTest` — `/` needs the
  `news` table) are reported openly, not hidden; they are independent of this refactor.
- Post-cleanup CSS audit: **0** candidate-dead class selectors in all four shared stylesheets and in
  every view's inline `<style>`; `gallery-overlay` / `remember-*` confirmed absent from the views.
- Temporary feature test (in-memory SQLite, **removed after running**) — **3 tests / 38 assertions
  passed**. Exercised over the real HTTP stack: `/`, `/news`, `/gallery`, `/news/1`, `/gallery/1`,
  `/login` (asserts `auth.css` link present and the removed `remember-wrapper`/`gallery-overlay`
  absent), a missing URL → 404 rendering `error.css` + the error content, and the admin dashboard
  plus **all six** CRUD sections' index/create/edit screens (`news`, `gallery`, `product`, `inbox`,
  `rating`, `admins`) as a `super_admin` (each asserted 200 with `admin.css`).
- Live-server smoke (`php artisan serve --port=8901`): `/` 200, `/news` 200, `/gallery` 200,
  `/login` 200, all four stylesheets 200, unknown URL 404. Served HTML contains 0 occurrences of the
  removed `gallery-overlay` / `remember-*`, and the 404 renders `error-code` + "Halaman Tidak
  Ditemukan".
- Net effect: CSS-only deletions of unreferenced rules + 4 unreferenced imports → no markup, route,
  controller, validation, auth, pagination or flash-message changes; no new visual/functional
  regressions.

## Navbar consistency fix (post-Batch 4, guest navbar)

### Root cause of the inconsistency
The public pages already shared `x-public.navbar`, but each page's inline `<style>` loaded *after*
`public.css` and re-declared `.navbar`/`.nav-link` with different values, so they won:

- `dedicatedpage.news.dedicated` / `dedicatedpage.gallery.dedicated` re-set `.nav-link { color:
  #334155 !important }` (slate-700) instead of the welcome reference `#64748b` (slate-500), and
  re-declared the navbar block.
- `dedicatedpage.gallery.index` re-declared `.navbar`/`.nav-link` with values identical to
  `public.css` (redundant duplication, no visual effect).
- `errors/404` / `errors/500` did **not** use the shared guest navbar at all: they rendered a
  distinct `x-public.auth-navbar` (via `x-public.auth-layout`) with different markup
  (`navbar-expand-md`, no `sticky-top`, `<i class="bi bi-list">` toggler instead of
  `navbar-toggler-icon`) and a transparent/white treatment from `auth.css`.

### Fix
- `resources/views/components/public/navbar.blade.php` — added a third `variant`:
  `on-blue` (keeps the `inner` cross-page link destinations, adds the `navbar-on-blue` modifier
  class for the blue background).
- `resources/views/components/public/auth-layout.blade.php` — new optional `navbarVariant` prop;
  when set it renders the shared `x-public.navbar` instead of `x-public.auth-navbar`. Existing
  usages (login) are unchanged.
- `resources/views/errors/404.blade.php`, `resources/views/errors/500.blade.php` — pass
  `navbarVariant="on-blue"`.
- `public/css/error.css` — replaced the old auth-navbar toggler/mobile rules with the
  `navbar-on-blue` variant: welcome sizing (1.5rem / 1rem padding, 1.65rem brand, active link
  white), a light `--bs-navbar-color`, a `brightness(0) invert(1)` filter so the toggler icon is
  white on blue, and `position: static` so the transparent bar scrolls away instead of overlapping
  content (the error pages were not sticky before). Base blue colours (transparent bg, white brand
  and links) come from the existing `auth.css` navbar rules.
- `dedicatedpage.gallery.index`, `dedicatedpage.news.dedicated`,
  `dedicatedpage.gallery.dedicated` — removed the redundant page-level `.navbar`/`.nav-link`
  overrides so all four News/Gallery pages inherit the welcome navbar from `public.css`.
- `public.css` needed **no** change: its navbar rules are already the welcome reference.

### Variants by page type
- `welcome` → shared navbar, `variant="landing"` (in-page hash anchors, `Home` active).
- all four News/Gallery pages → shared navbar, `variant="inner"` (cross-page links, section
  active).
- `errors/404`, `errors/500` → shared navbar, `variant="on-blue"` (cross-page links, no active
  link, light-on-blue).
- `auth/login` → unchanged (`x-public.auth-navbar`, `Major` → `/#progrms`).

### Verification
- `php artisan view:cache` — **passes**.
- `php artisan test` — **22 passed, 3 failed** (the same three pre-existing failures:
  `RegistrationTest` ×2, `ExampleTest`); no regressions.
- Rendered HTML inspection (live `php artisan serve`): all six public pages +
  `/definitely-not-a-page` render `<nav class="navbar navbar-expand-lg sticky-top…">`; the 404 adds
  `navbar-on-blue`. Nav links confirmed: landing uses `#…` anchors with `Home` active; News/Gallery
  pages point to `/news`, `/gallery` with the section active; the error page uses the canonical
  cross-page links (`/`, `/#about`, `/#programs`, `/news`, `/gallery`, `/#rating`, `/#contact`).
- Headless Chromium screenshots (desktop 1280×760 and mobile 390px) of `/`, `/news`, `/gallery`,
  `/news/1`, `/gallery/1`, and the 404: navbar brand/links/spacing match the welcome reference;
  the 404 is white-on-blue with a white collapsed toggler (visible and legible).
- CSS audit (`css_audit.php`) — **0** candidate-dead selectors and 0 duplicate selectors in
  `public.css`, `auth.css`, `error.css`.
- **Intentional delta:** on the error pages `News` now points at `/news` (the News listing) like
  the rest of the site, instead of the homepage `#news` anchor — a consequence of using the one
  shared navbar. All other error-page links are unchanged.

## Not yet touched (optional — out of scope)

- ~~Unify list-card / table styles across admin indexes~~ — already unified in `admin.css` (Batch 2);
  Batch 4 confirmed there are no duplicate selectors/blocks to merge.
- ~~Dead imports in `routes/web.php`~~ — removed in Batch 4 (plus `App\Models\Product`).
- ~~Obsolete/orphaned CSS cleanup~~ — Batch 4 removed the only confirmed-dead rules and found none
  remaining.
- Remaining (optional): the Breeze/Tailwind `profile/edit` page is the last view on `@vite` +
  the Tailwind stack. It is intentionally **not** merged with the Bootstrap public/admin/royal-blue
  systems; a future decision could harmonise or leave it as-is.
- Optional hardening (out of scope): the pre-existing test failures noted above.

## Resume instructions (if further work is requested)

1. Re-run `php artisan view:cache` to confirm a clean start.
2. If harmonising Breeze/Tailwind with the Bootstrap systems is desired, treat it as its own
   reviewed batch (it would change the `profile/edit` design and is **not** covered here).
3. Anything else (new features, design changes) is outside the cleanup scope — confirm before starting.
