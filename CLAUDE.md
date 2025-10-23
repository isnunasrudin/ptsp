# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Project PTSP adalah kepanjangan dari Pelayanan Terpadu Satu Pintu. Layanan ini dimiliki oleh instansi MTsN 2 Trenggalek. Layanan ini berisi pencatatan pelayananan dan juga survei kepuasan. Ini adalah project Laravel standard dengan authentication system dan admin dashboard.

## Environment Setup

**Untuk instalasi awal:**
```bash
composer install
cp .env.example .env
php artisan key:generate
```

**Konfigurasi database:**
- Edit file `.env` untuk setting database connection
- Default database: `laravel_sb_admin_2`
- Run migrations: `php artisan migrate`

**Development server:**
```bash
php artisan serve
npm run dev          # Untuk development assets
npm run watch        # Untuk watch asset changes
```

**Build untuk production:**
```bash
npm run production
```

## Testing

**Menjalankan semua tests:**
```bash
php artisan test
# atau
./vendor/bin/phpunit
```

## Project Structure

### Controllers
- `HomeController` - Dashboard dengan widget statistik
- `ProfileController` - Manajemen profil user
- Authentication menggunakan Laravel UI dengan routes standard

### Models
- `User` - Model user standard dengan tambahan `last_name` field
- Ada custom accessor `getFullNameAttribute()` dan mutator `setPasswordAttribute()`
- `Feedback` - Model untuk Survei Kepuasan Pelayanan
- `Support` - Model untuk Buku Tamu

### Routes
- Web routes di `routes/web.php`
- Standard authentication routes dengan `Auth::routes()`
- Custom routes: `/home`, `/profile`, `/about`

### Frontend
- Menggunakan Laravel Mix untuk asset compilation
- Template SB Admin 2 untuk admin interface
- Views di `resources/views/`
- Root Template ada di `resources/views/layouts`

## Dependencies Penting

- `devmarketer/easynav` - Navigation management
- `laravel/ui` - Authentication scaffolding
- `laravel/tinker` - Laravel REPL
- Laravel Mix untuk asset compilation
- Bootstrap theme SB Admin 2

## Database

- MySQL connection default
- Standard Laravel tables (users, cache, jobs)
- Additional tables: feedbacks, supports (based pada migration files yang belum di-run)

## Development Notes

- Project menggunakan Laravel 12 (requires PHP >= 8.2)
- Asset compilation menggunakan Laravel Mix (bukan Vite)
- Session driver: file
- Cache driver: database
- Queue connection: database

## Commands yang Sering Digunakan

```bash
# Fresh installation
composer install && npm install
cp .env.example .env && php artisan key:generate

# Development
php artisan serve
npm run watch

# Database
php artisan migrate
php artisan db:seed

# Testing
php artisan test

# Cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

- Selalu update file ini bersamaan dengan perubahan yang dibuat
- Selalu gunakan Context7 jika ingin menuliskan kode
- Jika ingin membuat halaman pada admin dashboard, selalu gunakan root template di `resources/views/layouts`