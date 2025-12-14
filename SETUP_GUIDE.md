# 🚀 Setup Guide - DigiSolusi Platform Pelatihan Online

## Panduan Setup Lengkap Step-by-Step

### Prerequisites
Pastikan sudah terinstall:
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM (opsional, untuk development)

---

## 📋 Step 1: Database Setup

### Buat Database
```sql
CREATE DATABASE pelatihan_online CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Via phpMyAdmin
1. Buka phpMyAdmin
2. Klik tab "Databases"
3. Masukkan nama: `pelatihan_online`
4. Collation: `utf8mb4_unicode_ci`
5. Klik "Create"

---

## 📋 Step 2: Laravel Setup

### 1. Install Dependencies
```bash
cd pelatihan-online
composer install
```

**Troubleshooting**: Jika ada error composer, coba:
```bash
composer update
composer install --ignore-platform-reqs
```

### 2. Copy Environment File
```bash
cp .env.example .env
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

---

## 📋 Step 3: Configure Environment

Edit file `.env` dan sesuaikan:

```env
APP_NAME="DigiSolusi"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pelatihan_online
DB_USERNAME=root          # Sesuaikan username MySQL
DB_PASSWORD=              # Sesuaikan password MySQL (kosongkan jika tidak ada)
```

---

## 📋 Step 4: Database Migration & Seeding

### Run Migrations
```bash
php artisan migrate
```

Output yang benar:
```
Migration table created successfully.
Migrating: 2024_01_01_000001_create_users_table
Migrated:  2024_01_01_000001_create_users_table
Migrating: 2024_01_01_000002_create_pelatihan_table
Migrated:  2024_01_01_000002_create_pelatihan_table
Migrating: 2024_01_01_000003_create_pendaftaran_table
Migrated:  2024_01_01_000003_create_pendaftaran_table
```

### Run Seeders (Sample Data)
```bash
php artisan db:seed
```

Ini akan membuat:
- 1 Admin user: `admin@digisolusi.com`
- 1 Test user: `user@test.com`
- 6 Sample pelatihan

---

## 📋 Step 5: Storage Setup

### Create Storage Link
```bash
php artisan storage:link
```

Ini untuk upload gambar pelatihan. Output:
```
The [public/storage] link has been connected to [storage/app/public].
```

---

## 📋 Step 6: Start Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

**Alternative**: Jika port 8000 sudah dipakai:
```bash
php artisan serve --port=8001
```

---

## 🎯 Testing Application

### 1. Frontend (Public Pages)
Buka browser: `http://localhost:8000`

Pages yang bisa diakses:
- Home: `/`
- About: `/about`
- Pelatihan: `/pelatihan`
- Contact: `/contact`

### 2. Login sebagai User
```
URL: http://localhost:8000/login
Email: user@test.com
Password: password
```

Setelah login, akses:
- Dashboard: `/dashboard`
- Profile: `/profile`
- Kelas Saya: `/kelas-saya`

### 3. Login sebagai Admin
```
URL: http://localhost:8000/login
Email: admin@digisolusi.com
Password: password
```

Setelah login, akses:
- Admin Dashboard: `/admin/dashboard`
- Kelola Pelatihan: `/admin/pelatihan`
- Kelola Pendaftaran: `/admin/pendaftaran`

---

## 🔧 Common Issues & Solutions

### Issue 1: Error "Class 'AdminMiddleware' not found"
**Solution**:
```bash
php artisan config:clear
php artisan cache:clear
composer dump-autoload
```

### Issue 2: Storage link tidak jalan
**Solution**:
```bash
# Hapus symlink lama
rm public/storage

# Buat ulang
php artisan storage:link
```

### Issue 3: Migration error "Database does not exist"
**Solution**:
Pastikan database sudah dibuat:
```sql
CREATE DATABASE pelatihan_online;
```

### Issue 4: 500 Internal Server Error
**Solution**:
```bash
# Set permission folder
chmod -R 775 storage bootstrap/cache

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Issue 5: Gambar upload tidak muncul
**Solution**:
```bash
php artisan storage:link
```
Pastikan folder `storage/app/public` ada.

---

## 🎨 Customization Guide

### Ubah Logo/Brand
Edit file: `resources/views/layouts/app.blade.php`
```html
<!-- Line 16-18 -->
<span class="text-2xl font-bold text-blue-600">Digi</span>
<span class="text-2xl font-bold text-gray-800">Solusi</span>
```

### Ubah Color Theme
Ganti warna blue dengan warna lain di semua file blade:
- `bg-blue-600` → `bg-green-600`
- `text-blue-600` → `text-green-600`
- dll.

### Tambah Menu
Edit `resources/views/layouts/app.blade.php`:
```html
<a href="/menu-baru" class="text-gray-700 hover:text-blue-600 px-3 py-2">
    Menu Baru
</a>
```

---

## 📊 Database Management

### Export Database
```bash
mysqldump -u root -p pelatihan_online > backup.sql
```

### Import Database
```bash
mysql -u root -p pelatihan_online < backup.sql
```

### Reset Database
```bash
php artisan migrate:fresh --seed
```
⚠️ **Warning**: Ini akan menghapus semua data!

---

## 🚀 Deployment to Production

### 1. Environment Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

### 2. Optimize Application
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Set Permissions
```bash
chmod -R 755 /path/to/project
chmod -R 775 storage bootstrap/cache
```

### 4. Database Migration
```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 📞 Support & Documentation

- **Laravel Docs**: https://laravel.com/docs
- **Tailwind CSS**: https://tailwindcss.com/docs
- **Font Awesome**: https://fontawesome.com/icons

---

## ✅ Checklist Setup Completion

- [ ] PHP 8.2+ installed
- [ ] Composer installed
- [ ] MySQL installed & running
- [ ] Database created
- [ ] Dependencies installed (`composer install`)
- [ ] Environment configured (`.env`)
- [ ] App key generated
- [ ] Migrations run successfully
- [ ] Seeders run successfully
- [ ] Storage link created
- [ ] Development server running
- [ ] Can access frontend pages
- [ ] Can login as user
- [ ] Can login as admin

Jika semua checklist ✅, setup berhasil! 🎉
