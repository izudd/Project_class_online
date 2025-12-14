# 📁 Struktur Project - DigiSolusi

## Struktur Direktori Lengkap

```
pelatihan-online/
│
├── app/                                    # Application logic
│   ├── Http/
│   │   ├── Controllers/                    # Controllers
│   │   │   ├── AdminController.php
│   │   │   ├── AuthController.php
│   │   │   ├── HomeController.php
│   │   │   └── UserDashboardController.php
│   │   └── Middleware/                     # Custom middleware
│   │       └── AdminMiddleware.php
│   └── Models/                             # Eloquent models
│       ├── Pendaftaran.php
│       ├── Pelatihan.php
│       └── User.php
│
├── bootstrap/                              # Framework bootstrap
│   ├── app.php                             # Application bootstrap
│   └── cache/                              # Framework cache (auto-generated)
│
├── config/                                 # Configuration files
│   ├── app.php                             # App config
│   ├── auth.php                            # Authentication config
│   ├── database.php                        # Database config
│   ├── filesystems.php                     # File storage config
│   └── session.php                         # Session config
│
├── database/                               # Database files
│   ├── migrations/                         # Database migrations
│   │   ├── 2024_01_01_000000_create_sessions_table.php
│   │   ├── 2024_01_01_000001_create_users_table.php
│   │   ├── 2024_01_01_000002_create_pelatihan_table.php
│   │   └── 2024_01_01_000003_create_pendaftaran_table.php
│   └── seeders/                            # Database seeders
│       └── DatabaseSeeder.php              # Sample data
│
├── public/                                 # Web root (publicly accessible)
│   ├── .htaccess                           # Apache rewrite rules
│   ├── index.php                           # Entry point
│   └── storage/                            # Symlink to storage/app/public
│
├── resources/                              # Raw assets & views
│   └── views/                              # Blade templates
│       ├── layouts/                        # Layout templates
│       │   ├── admin.blade.php             # Admin dashboard layout
│       │   ├── app.blade.php               # Frontend layout
│       │   └── user.blade.php              # User dashboard layout
│       ├── admin/                          # Admin views
│       │   ├── dashboard.blade.php         # Admin dashboard
│       │   ├── pelatihan/                  # Pelatihan management
│       │   │   ├── create.blade.php
│       │   │   ├── edit.blade.php
│       │   │   └── index.blade.php
│       │   └── pendaftaran/                # Pendaftaran management
│       │       └── index.blade.php
│       ├── auth/                           # Authentication views
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── frontend/                       # Public views
│       │   ├── about.blade.php
│       │   ├── contact.blade.php
│       │   ├── home.blade.php
│       │   ├── pelatihan.blade.php
│       │   └── pelatihan-detail.blade.php
│       └── user/                           # User dashboard views
│           ├── dashboard.blade.php
│           ├── kelas-saya.blade.php
│           └── profile.blade.php
│
├── routes/                                 # Route definitions
│   ├── console.php                         # Artisan commands
│   └── web.php                             # Web routes
│
├── storage/                                # Storage directory
│   ├── app/                                # Application storage
│   │   └── public/                         # Public files (symlinked)
│   ├── framework/                          # Framework files
│   │   ├── cache/                          # Cache storage
│   │   ├── sessions/                       # Session files
│   │   └── views/                          # Compiled views
│   └── logs/                               # Application logs
│
├── vendor/                                 # Composer dependencies (auto-generated)
│
├── .env.example                            # Environment template
├── .gitignore                              # Git ignore rules
├── artisan                                 # Artisan CLI
├── composer.json                           # Composer dependencies
├── FITUR.md                                # Features documentation
├── install.sh                              # Auto installation script
├── package.json                            # NPM dependencies
├── phpunit.xml                             # PHPUnit config
├── README.md                               # Project overview
└── SETUP_GUIDE.md                          # Detailed setup guide
```

## 📋 File Descriptions

### Root Files

| File | Deskripsi |
|------|-----------|
| `artisan` | Laravel CLI tool untuk migration, seeding, dll |
| `composer.json` | PHP dependencies (Laravel, packages) |
| `package.json` | Node dependencies (optional) |
| `.env.example` | Template environment variables |
| `.gitignore` | Files yang diabaikan Git |
| `phpunit.xml` | Testing configuration |
| `install.sh` | Auto installation script |

### App Directory

| Directory | Deskripsi |
|-----------|-----------|
| `app/Http/Controllers/` | Logic untuk handle requests |
| `app/Http/Middleware/` | Request filtering (auth, admin check) |
| `app/Models/` | Database models (Eloquent ORM) |

### Database Directory

| Directory | Deskripsi |
|-----------|-----------|
| `database/migrations/` | Database schema definitions |
| `database/seeders/` | Sample data generators |

### Resources Directory

| Directory | Deskripsi |
|-----------|-----------|
| `resources/views/layouts/` | Master templates |
| `resources/views/frontend/` | Public pages |
| `resources/views/admin/` | Admin dashboard |
| `resources/views/user/` | User dashboard |
| `resources/views/auth/` | Login/Register pages |

### Config Directory

| File | Deskripsi |
|------|-----------|
| `config/app.php` | Application settings |
| `config/database.php` | Database connections |
| `config/auth.php` | Authentication settings |
| `config/filesystems.php` | File storage config |
| `config/session.php` | Session handling |

### Storage Directory

| Directory | Deskripsi |
|-----------|-----------|
| `storage/app/public/` | User uploads (gambar pelatihan) |
| `storage/framework/` | Framework cache & compiled views |
| `storage/logs/` | Application log files |

## 🔄 Data Flow

### Request Flow
```
Public URL
    ↓
public/index.php (entry point)
    ↓
bootstrap/app.php (bootstrap)
    ↓
routes/web.php (routing)
    ↓
app/Http/Controllers/ (logic)
    ↓
app/Models/ (database)
    ↓
resources/views/ (templates)
    ↓
Response to User
```

### File Upload Flow
```
User uploads image
    ↓
Controller validation
    ↓
storage/app/public/pelatihan/
    ↓
Symlink: public/storage → storage/app/public
    ↓
Accessible via: /storage/pelatihan/filename.jpg
```

## 📝 Important Notes

### Symlink Storage
Setelah install, jalankan:
```bash
php artisan storage:link
```
Ini membuat symlink dari `public/storage` → `storage/app/public` untuk akses gambar upload.

### File Permissions
Set permission yang benar:
```bash
chmod -R 775 storage bootstrap/cache
```

### Composer Autoload
Setelah update code, jalankan:
```bash
composer dump-autoload
```

### Cache Clear
Jika ada issue, clear cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 🎯 Development Workflow

1. **Edit Code** → `app/`, `resources/views/`, `routes/`
2. **Migration** → `php artisan migrate`
3. **Seed Data** → `php artisan db:seed`
4. **Test** → `php artisan serve`
5. **Clear Cache** → `php artisan cache:clear` (if needed)

## 📦 Deployment Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Set proper file permissions (775 storage, 644 others)
- [ ] Setup `.env` with production values
- [ ] Create symlink `php artisan storage:link`
- [ ] Migrate database `php artisan migrate --force`

---

**Note**: Struktur ini mengikuti Laravel 11 best practices dan production-ready! 🚀
