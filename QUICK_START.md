# 🚀 Quick Start - DigiSolusi

## ✅ Struktur Project SUDAH PROPER!

Project ini sudah dibuat dengan **struktur Laravel 11 yang benar**, bukan file flat!

```
pelatihan-online/
├── 📁 app/                     ← Controllers, Models, Middleware
├── 📁 bootstrap/               ← Framework bootstrap
├── 📁 config/                  ← Configuration files
├── 📁 database/                ← Migrations & Seeders
├── 📁 public/                  ← Web root (index.php)
├── 📁 resources/views/         ← Blade templates
├── 📁 routes/                  ← Web & Console routes
├── 📁 storage/                 ← File storage & logs
├── 📄 .env.example
├── 📄 artisan                  ← CLI tool
├── 📄 composer.json
├── 📄 README.md
└── 📄 SETUP_GUIDE.md
```

## 📦 Cara Install

### Opsi 1: Auto Install (Recommended)
```bash
cd pelatihan-online
chmod +x install.sh
./install.sh
```

### Opsi 2: Manual Install
```bash
cd pelatihan-online

# 1. Install dependencies
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Edit .env (sesuaikan database)
# DB_DATABASE=pelatihan_online
# DB_USERNAME=root
# DB_PASSWORD=

# 4. Migrate & Seed
php artisan migrate
php artisan db:seed

# 5. Storage link
php artisan storage:link

# 6. Run server
php artisan serve
```

## 🌐 Akses Website

**URL**: http://localhost:8000

**Admin Login**:
- Email: admin@digisolusi.com
- Password: password

**User Login**:
- Email: user@test.com
- Password: password

## 📁 File Locations (Untuk Development)

### Controllers
📂 `app/Http/Controllers/`
- AdminController.php
- AuthController.php
- HomeController.php
- UserDashboardController.php

### Models
📂 `app/Models/`
- User.php
- Pelatihan.php
- Pendaftaran.php

### Views (Frontend)
📂 `resources/views/frontend/`
- home.blade.php
- about.blade.php
- contact.blade.php
- pelatihan.blade.php
- pelatihan-detail.blade.php

### Views (User Dashboard)
📂 `resources/views/user/`
- dashboard.blade.php
- profile.blade.php
- kelas-saya.blade.php

### Views (Admin Dashboard)
📂 `resources/views/admin/`
- dashboard.blade.php
- pelatihan/index.blade.php
- pelatihan/create.blade.php
- pelatihan/edit.blade.php
- pendaftaran/index.blade.php

### Migrations
📂 `database/migrations/`
- 2024_01_01_000000_create_sessions_table.php
- 2024_01_01_000001_create_users_table.php
- 2024_01_01_000002_create_pelatihan_table.php
- 2024_01_01_000003_create_pendaftaran_table.php

### Routes
📂 `routes/`
- web.php (semua routes ada di sini)

## 🛠️ Common Commands

```bash
# Start server
php artisan serve

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Migrate database
php artisan migrate

# Seed database
php artisan db:seed

# Reset database (DANGER!)
php artisan migrate:fresh --seed

# Storage link
php artisan storage:link

# Optimize (production)
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📝 Development Tips

### Edit Frontend Design
File: `resources/views/layouts/app.blade.php`

### Edit Admin Dashboard
File: `resources/views/layouts/admin.blade.php`

### Add New Routes
File: `routes/web.php`

### Upload Gambar
Lokasi: `storage/app/public/pelatihan/`
Akses: `/storage/pelatihan/nama-file.jpg`

### Database
Config: `config/database.php`
.env: `DB_CONNECTION=mysql`

## ⚡ Features Checklist

✅ Proper Laravel 11 structure
✅ MVC architecture
✅ Authentication (Login/Register)
✅ Role-based access (Admin/User)
✅ CRUD Pelatihan
✅ File upload (gambar)
✅ Responsive design
✅ Tailwind CSS
✅ Font Awesome icons
✅ Flash messages
✅ Form validation
✅ Database relationships
✅ Pagination
✅ Professional UI/UX

## 📚 Documentation

- **README.md** - Overview & quick intro
- **SETUP_GUIDE.md** - Detailed installation steps
- **FITUR.md** - Complete features documentation
- **STRUKTUR.md** - Project structure explanation
- **QUICK_START.md** - This file!

## 🐛 Troubleshooting

**Problem**: Class not found
```bash
composer dump-autoload
```

**Problem**: Permission denied
```bash
chmod -R 775 storage bootstrap/cache
```

**Problem**: Storage link broken
```bash
rm public/storage
php artisan storage:link
```

**Problem**: Migration error
```bash
# Make sure database exists
# Check .env DB_* settings
php artisan migrate:fresh
```

## 🎯 Next Steps

1. ✅ Extract project ke folder kamu
2. ✅ Jalankan `composer install`
3. ✅ Setup `.env` file
4. ✅ Migrate database
5. ✅ Test di browser
6. 🚀 Start developing!

---

**Happy Coding!** 🎉

Kalo ada masalah, cek SETUP_GUIDE.md untuk troubleshooting lengkap.
