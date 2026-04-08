# WebSec240100766 Codebase Guide

This README explains what every major folder does and what each tracked source file is for, so you can confidently describe the full project architecture.

## What This Project Is

This is a Laravel web application for a secure online product store with:

- Authentication (register/login/logout)
- Role-based access (`admin`, `employee`, `customer`)
- Product management
- Customer credit management
- Purchase flow with stock and credit checks

## High-Level Request Flow

1. Request enters through `public/index.php`.
2. Laravel boots from `bootstrap/app.php`.
3. Route is matched in `routes/web.php`.
4. Middleware (`auth`, `guest`, custom `role`) checks access.
5. Controller handles logic and talks to models.
6. Model reads/writes database tables.
7. Blade view renders HTML response.

## Root Files (Top Level)

- `.editorconfig`: editor formatting defaults.
- `.env`: local environment variables and secrets.
- `.env.example`: template of required environment variables.
- `.gitattributes`: Git behavior rules (line endings, exports).
- `.gitignore`: files/folders Git should not track.
- `.phpunit.result.cache`: cached test metadata for faster reruns.
- `artisan`: Laravel CLI entry point.
- `composer.json`: PHP dependencies and Laravel scripts.
- `composer.lock`: exact installed PHP dependency versions.
- `package.json`: Node/Vite frontend dependencies and scripts.
- `phpunit.xml`: test configuration and environment values.
- `vite.config.js`: Vite asset build/dev-server config.
- `README.md`: this documentation file.

## `app/` - Application Code

Holds your core business logic.

### `app/Http/Controllers/`

- `Controller.php`: base controller class extended by all controllers.
- `AuthController.php`: registration/login/logout and role-based dashboard redirect.
- `AdminUserController.php`: admin-only user CRUD (create/edit/delete admin/employee/customer).
- `CustomerController.php`: staff customer listing, credit top-up, and customer account page.
- `ProductController.php`: admin/employee product CRUD.
- `PurchaseController.php`: customer store listing and purchase transaction logic.
- `RolePermissionController.php`: admin-only static role-permission matrix page.

### `app/Http/Middleware/`

- `RoleMiddleware.php`: custom middleware enforcing allowed roles per route.

### `app/Models/`

- `User.php`: authenticatable user model with `role`, `credit`, and purchase relationship.
- `Product.php`: product entity (`name`, `price`, `description`, `stock_quantity`).
- `Purchase.php`: purchase entity linking user and product with quantity/price totals.

### `app/Providers/`

- `AppServiceProvider.php`: place for app-wide service bootstrapping.

## `bootstrap/` - Framework Bootstrapping

- `app.php`: builds Laravel app, registers routes, middleware aliases, exceptions.
- `providers.php`: list of service providers loaded by the app.
- `cache/.gitignore`: keeps cache directory tracked but empty in Git.
- `cache/packages.php`: cached package manifest (generated).
- `cache/services.php`: cached service container/provider map (generated).

## `config/` - Runtime Configuration

- `app.php`: app name, timezone, locale, and global framework settings.
- `auth.php`: guards/providers/password reset configuration.
- `cache.php`: cache store and prefix settings.
- `database.php`: DB connections and migration table settings.
- `filesystems.php`: local/public/cloud disk configuration.
- `logging.php`: log channels and log stack behavior.
- `mail.php`: mail transport configuration.
- `queue.php`: queue connections and failed-job settings.
- `services.php`: third-party service credentials config.
- `session.php`: session storage, lifetime, and cookie behavior.

## `database/` - Data Layer Setup

### Root

- `.gitignore`: keeps folder in Git while excluding generated artifacts.

### `database/factories/`

- `UserFactory.php`: generates fake users for tests/seed data.

### `database/migrations/`

- `0001_01_01_000000_create_users_table.php`: creates `users`, `password_reset_tokens`, `sessions` tables.
- `0001_01_01_000001_create_cache_table.php`: creates cache tables.
- `0001_01_01_000002_create_jobs_table.php`: creates jobs/failed jobs tables.
- `2026_04_01_225150_create_products_table.php`: creates `products` table.
- `2026_04_01_225150_create_purchases_table.php`: creates `purchases` table.

### `database/seeders/`

- `DatabaseSeeder.php`: seeds default admin and sample customer accounts.

## `public/` - Web Root

- `.htaccess`: Apache rewrite rules to route requests to Laravel.
- `index.php`: single front controller for all HTTP requests.
- `favicon.ico`: browser tab icon.
- `robots.txt`: crawler instructions.

## `resources/` - Frontend Assets and Templates

### `resources/css/`

- `app.css`: main stylesheet entry.

### `resources/js/`

- `app.js`: JavaScript entry imported by Vite.
- `bootstrap.js`: axios/bootstrap setup for frontend requests.

### `resources/views/` (Blade Templates)

- `welcome.blade.php`: public landing page.

#### `resources/views/layouts/`

- `app.blade.php`: shared page layout (navbar, alerts, content slot).

#### `resources/views/partials/`

- `head.blade.php`: reusable HTML head/opening markup (legacy partial).
- `footer.blade.php`: reusable closing scripts/body/html markup (legacy partial).

#### `resources/views/auth/`

- `login.blade.php`: login form page.
- `register.blade.php`: registration form page.

#### `resources/views/admin/`

- `roles_permissions.blade.php`: role-capabilities matrix view.

##### `resources/views/admin/users/`

- `index.blade.php`: user list for admin portal.
- `create.blade.php`: create user page.
- `edit.blade.php`: edit user page.
- `form.blade.php`: reusable admin user form fields.

#### `resources/views/products/`

- `index.blade.php`: product list for admin/employee.
- `create.blade.php`: create product page.
- `edit.blade.php`: edit product page.
- `form.blade.php`: reusable product form fields.

#### `resources/views/customers/`

- `index.blade.php`: customer list and add-credit form for staff.
- `account.blade.php`: customer profile with credit and purchase history.

#### `resources/views/store/`

- `index.blade.php`: customer-only product catalog and buy forms.

## `routes/` - Route Definitions

- `web.php`: browser routes for auth, admin portal, employee portal, customer portal.
- `console.php`: Artisan console command route definitions.

## `storage/` - Runtime-Generated Files

- `app/.gitignore`: keeps storage app directory structure in Git.
- `app/private/.gitignore`: placeholder for private files.
- `app/public/.gitignore`: placeholder for public storage files.
- `logs/.gitignore`: keeps logs directory tracked but empty.
- `logs/laravel.log`: application runtime logs.

## `tests/` - Automated Tests

- `TestCase.php`: base test class for feature/unit tests.

### `tests/Feature/`

- `ExampleTest.php`: default Laravel feature smoke test.
- `AuthorizationTest.php`: validates registration role assignment and role-based access.
- `PurchaseFlowTest.php`: validates insufficient credit and successful purchase behavior.

### `tests/Unit/`

- `ExampleTest.php`: default Laravel unit test example.

## `vendor/` - Composer Dependencies

Contains third-party packages (Laravel framework and libraries). You typically do not edit files here.

## Security Design Summary

- Route groups enforce `guest`, `auth`, and `role` constraints.
- Sensitive actions use server-side validation in controllers.
- Registration force-assigns `customer` role.
- Purchase uses DB transaction and row locks to avoid race conditions.
- CSRF protection is enforced on forms via Blade `@csrf` tokens.

## Local Run Commands

1. Install PHP dependencies: `composer install`
2. Install JS dependencies: `npm install`
3. Configure environment: copy `.env.example` to `.env`
4. Generate key: `php artisan key:generate`
5. Run migrations + seed: `php artisan migrate --seed`
6. Start app: `php artisan serve`

## Notes for Interviews / Explanations

If asked "what does this codebase look like?", a good short answer is:

"It is a Laravel MVC application. `routes/web.php` defines role-protected routes, controllers in `app/Http/Controllers` implement auth/store/admin logic, models in `app/Models` map DB entities, migrations in `database/migrations` define schema, and Blade templates in `resources/views` render role-specific portals."
