# Portfolio — Laravel Blade Frontend

## Folder Structure

```
frontend/
├── app/
│   ├── Http/Controllers/
│   │   └── PortfolioController.php    ← main controller (with dummy fallback)
│   └── Models/
│       └── Portfolio.php              ← owner profile model
│
├── routes/
│   └── web.php                        ← public + admin routes
│
└── resources/views/
    ├── layouts/
    │   └── app.blade.php              ← master layout
    │
    ├── partials/                      ← reusable micro-pieces
    │   ├── design-tokens.blade.php   ← CSS variables + reset (Lora + DM Sans + DM Mono)
    │   ├── cursor.blade.php           ← custom ink-drop pointer cursor
    │   ├── loader.blade.php           ← page loader
    │   ├── toast.blade.php            ← notification toast
    │   └── scripts.blade.php          ← all global JS
    │
    ├── sections/                      ← one file per page section
    │   ├── navigation.blade.php
    │   ├── mobile-drawer.blade.php
    │   ├── hero.blade.php
    │   ├── about.blade.php
    │   ├── skills.blade.php
    │   ├── experience.blade.php
    │   ├── education.blade.php
    │   ├── certifications.blade.php
    │   ├── projects.blade.php
    │   ├── contact.blade.php
    │   └── footer.blade.php
    │
    └── portfolio.blade.php            ← page view (extends layouts.app)
```

---

## How Dynamic Data Works

`PortfolioController::index()` tries to load from DB first.
If **no rows exist**, it falls back to **hardcoded dummy data** — so the
site always looks great even before the admin panel is filled in.

```php
// Example: skills
$groups = SkillGroup::with('skills')->orderBy('sort_order')->get();
if ($groups->isEmpty()) {
    return $this->dummySkillGroups();   // ← dummy fallback
}
```

All data is **cached for 1 hour** (`Cache::remember`).
Clear it after admin saves: `Cache::flush()` or tag-based invalidation.

---

## DB Models & Tables Needed

| Model           | Table             | Key Columns                                                     |
|-----------------|-------------------|-----------------------------------------------------------------|
| Portfolio       | portfolios        | name, title, bio, email, phone, github, linkedin, resume_url…  |
| SkillGroup      | skill_groups      | emoji, category, sort_order                                     |
| Skill           | skills            | skill_group_id, name, percent                                   |
| Experience      | experiences       | role, company, location, period_label, is_current, bullets(json)|
| Education       | education         | degree, institution, location, period_label, score, emoji       |
| Certification   | certifications    | name, issuer, issuer_icon, icon, cert_url, sort_order           |
| Project         | projects          | title, category, description, image_url, tags(json),           |
|                 |                   | github_url, live_url, is_confidential, sort_order               |

---

## Fonts Used (Natural Editorial Aesthetic)

| Font        | Usage       | Style                        |
|-------------|-------------|------------------------------|
| Lora        | Headings    | Classic serif, warm & elegant|
| DM Sans     | Body text   | Humanist, readable, natural  |
| DM Mono     | Labels/code | Clean monospace for data     |

---

## Custom Cursor

Changed from the old `cursor:none` + dot/ring to an **ink-drop pointer** style:
- Tiny filled circle (dot) follows mouse instantly
- Larger ring trails with spring easing
- **Expands** on hover over links/buttons
- **Morphs to blinking cursor bar** when focused on text inputs
- Disabled automatically on touch devices

---

## Admin Panel Integration

After saving any record in the admin:

```php
// In your Admin controller's store/update/destroy:
Cache::flush();
// or selectively:
Cache::forget('skill_groups');
Cache::forget('projects');
// etc.
```

---

## Quick Start

```bash
# Copy into your Laravel project root
cp -r frontend/* .

# Install deps (already standard Laravel)
composer install
npm install && npm run dev

# Run migrations
php artisan migrate

# Seed with your own data or leave empty (dummy data shows automatically)
php artisan db:seed --class=PortfolioSeeder
```
