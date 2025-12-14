# 🚀 Deploy DigiSolusi ke Vercel

## ⚠️ PENTING - Baca Dulu!

**Vercel Limitations untuk Laravel:**
- ❌ **No persistent file storage** - Upload gambar akan hilang setiap redeploy
- ❌ **No built-in MySQL** - Harus pakai database external (gratis: PlanetScale, Railway)
- ⚡ **Serverless** - First load bisa agak lambat (cold start)
- ✅ **Gratis** - Unlimited bandwidth & deployment

**Recommended Alternative:**
- 🟢 **Railway.app** - Support MySQL, persistent storage, Laravel-friendly
- 🟢 **Heroku** - Classic PaaS, easy setup
- 🟢 **Laravel Forge + DigitalOcean** - Production grade

---

## 📋 Prerequisites

1. **GitHub Account** - https://github.com
2. **Vercel Account** - https://vercel.com (login with GitHub)
3. **PlanetScale Account** (Database gratis) - https://planetscale.com
   - ATAU **Railway.app** untuk database

---

## 🔧 STEP 1: Setup Database (PlanetScale - Gratis)

### 1.1 Create PlanetScale Database

```bash
# 1. Buka https://planetscale.com
# 2. Sign up (gratis)
# 3. Create new database: "pelatihan-online"
# 4. Region: AWS ap-southeast-1 (Singapore - paling deket)
# 5. Copy connection string
```

### 1.2 Get Database Credentials

Di PlanetScale dashboard:
- Klik database "pelatihan-online"
- Tab "Connect"
- Framework: **Laravel**
- Copy credentials:
  ```
  DB_HOST=xxx.ap-southeast-1.psdb.cloud
  DB_USERNAME=xxx
  DB_PASSWORD=xxx
  DB_DATABASE=pelatihan-online
  ```

---

## 📦 STEP 2: Setup GitHub Repository

### 2.1 Create GitHub Repo

```bash
# 1. Buka https://github.com/new
# 2. Repository name: pelatihan-online
# 3. Description: Platform Pelatihan Online - DigiSolusi
# 4. Public / Private (pilih sesuai kebutuhan)
# 5. DON'T initialize with README (kita udah punya)
# 6. Click "Create repository"
```

### 2.2 Push Code ke GitHub

Di terminal/PowerShell (folder project):

```powershell
# 1. Initialize Git
git init

# 2. Add all files
git add .

# 3. Commit
git commit -m "Initial commit - DigiSolusi Platform"

# 4. Add remote (ganti YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/pelatihan-online.git

# 5. Push
git branch -M main
git push -u origin main
```

**Kalo Error "Git not found":**
```powershell
# Install Git dulu: https://git-scm.com/download/win
# Restart PowerShell, coba lagi
```

---

## ☁️ STEP 3: Deploy ke Vercel

### 3.1 Connect GitHub to Vercel

```bash
# 1. Buka https://vercel.com
# 2. Login with GitHub
# 3. Click "New Project"
# 4. Import Git Repository
# 5. Pilih "pelatihan-online" repo
# 6. Click "Import"
```

### 3.2 Configure Project

**Framework Preset:** Other
**Root Directory:** ./
**Build Command:** `composer install --no-dev --optimize-autoloader`
**Output Directory:** (kosongkan)

### 3.3 Environment Variables

Tambahkan di Vercel dashboard (Settings → Environment Variables):

```env
APP_NAME=DigiSolusi
APP_ENV=production
APP_KEY=base64:XXXXX
APP_DEBUG=false
APP_URL=https://your-project.vercel.app

LOG_CHANNEL=stderr
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=xxx.ap-southeast-1.psdb.cloud
DB_PORT=3306
DB_DATABASE=pelatihan-online
DB_USERNAME=xxx
DB_PASSWORD=xxx

SESSION_DRIVER=cookie
SESSION_LIFETIME=120
CACHE_DRIVER=array
QUEUE_CONNECTION=sync

FILESYSTEM_DISK=local
```

**Generate APP_KEY:**
```powershell
# Di local, run:
php artisan key:generate --show

# Copy hasilnya (base64:xxxxx)
# Paste ke Vercel environment variable APP_KEY
```

### 3.4 Deploy

```bash
# Click "Deploy"
# Wait 2-5 minutes
# Done! ✅
```

---

## 🗄️ STEP 4: Setup Database (Migration)

**Karena Vercel serverless, gak bisa run artisan migrate langsung.**

### Option A: Via PlanetScale Console (Recommended)

```bash
# 1. Connect ke PlanetScale
# 2. Buka "Console" tab
# 3. Copy-paste SQL migration manual
```

**Get SQL dari migration:**
```powershell
# Di local, export SQL:
php artisan migrate --pretend > migrations.sql

# Atau copy manual dari database/migrations/*.php
```

**SQL Migration (Manual):**
```sql
-- Run ini di PlanetScale Console

CREATE TABLE `users` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `role` enum('admin','user') NOT NULL DEFAULT 'user',
    `phone` varchar(255) DEFAULT NULL,
    `address` text,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pelatihan` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `nama_pelatihan` varchar(255) NOT NULL,
    `deskripsi` text NOT NULL,
    `instruktur` varchar(255) NOT NULL,
    `durasi_jam` int NOT NULL,
    `harga` decimal(10,2) NOT NULL,
    `kuota` int NOT NULL,
    `peserta_terdaftar` int NOT NULL DEFAULT '0',
    `tanggal_mulai` date NOT NULL,
    `tanggal_selesai` date NOT NULL,
    `waktu` varchar(255) NOT NULL,
    `status` enum('aktif','penuh','selesai') NOT NULL DEFAULT 'aktif',
    `gambar` varchar(255) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pendaftaran` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `user_id` bigint unsigned NOT NULL,
    `pelatihan_id` bigint unsigned NOT NULL,
    `status` enum('pending','diterima','ditolak') NOT NULL DEFAULT 'pending',
    `catatan` text,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pendaftaran_user_id_foreign` (`user_id`),
    KEY `pendaftaran_pelatihan_id_foreign` (`pelatihan_id`),
    CONSTRAINT `pendaftaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `pendaftaran_pelatihan_id_foreign` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
    `id` varchar(255) NOT NULL,
    `user_id` bigint unsigned DEFAULT NULL,
    `ip_address` varchar(45) DEFAULT NULL,
    `user_agent` text,
    `payload` longtext NOT NULL,
    `last_activity` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `sessions_user_id_index` (`user_id`),
    KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Admin User (password: password)
INSERT INTO `users` (`name`, `email`, `password`, `role`, `created_at`, `updated_at`) 
VALUES ('Admin DigiSolusi', 'admin@digisolusi.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NOW(), NOW());

-- Insert Sample Pelatihan
INSERT INTO `pelatihan` (`nama_pelatihan`, `deskripsi`, `instruktur`, `durasi_jam`, `harga`, `kuota`, `tanggal_mulai`, `tanggal_selesai`, `waktu`, `status`, `created_at`, `updated_at`) VALUES
('Web Development Fundamental', 'Pelajari dasar-dasar web development dari HTML, CSS, JavaScript hingga framework modern.', 'John Doe', 40, 1500000, 30, '2024-12-25', '2025-01-25', '09:00 - 12:00', 'aktif', NOW(), NOW()),
('Digital Marketing Strategy', 'Kuasai strategi digital marketing modern termasuk SEO, SEM, Social Media Marketing.', 'Jane Smith', 30, 1200000, 25, '2024-12-28', '2025-01-22', '13:00 - 16:00', 'aktif', NOW(), NOW()),
('UI/UX Design Mastery', 'Belajar membuat design interface yang user-friendly dan menarik.', 'Mike Johnson', 35, 1800000, 20, '2025-01-02', '2025-02-06', '09:00 - 12:00', 'aktif', NOW(), NOW());
```

### Option B: Via Local Migration to PlanetScale

```powershell
# 1. Update .env local dengan PlanetScale credentials
DB_HOST=xxx.ap-southeast-1.psdb.cloud
DB_USERNAME=xxx
DB_PASSWORD=xxx

# 2. Run migration dari local
php artisan migrate --force

# 3. Seed data
php artisan db:seed --force
```

---

## ✅ STEP 5: Verify Deployment

```bash
# 1. Buka URL Vercel (misal: https://pelatihan-online.vercel.app)
# 2. Test login:
#    - Email: admin@digisolusi.com
#    - Password: password
# 3. Check semua halaman
```

---

## 🔄 Update/Redeploy

Setiap kali ada perubahan code:

```powershell
# 1. Commit changes
git add .
git commit -m "Update: deskripsi perubahan"

# 2. Push to GitHub
git push

# 3. Vercel auto-deploy! ✅
```

---

## ⚠️ Known Issues & Workarounds

### Issue 1: Upload Gambar Hilang

**Problem:** Gambar yang di-upload hilang setelah redeploy
**Solution:** 
- Gunakan **Cloudinary** / **AWS S3** untuk storage
- Atau deploy ke Railway/Heroku yang support persistent storage

### Issue 2: Cold Start Lambat

**Problem:** First load 3-5 detik
**Solution:** 
- Normal untuk serverless
- Keep-alive: ping website tiap 5 menit

### Issue 3: Database Connection

**Problem:** Connection timeout
**Solution:**
- Pastikan PlanetScale credentials benar
- Enable SSL connection
- Check firewall

---

## 🎯 Production Checklist

- [ ] Database setup di PlanetScale
- [ ] Environment variables configured
- [ ] APP_KEY generated
- [ ] APP_DEBUG=false
- [ ] Migrations run successfully
- [ ] Admin account tested
- [ ] All pages working
- [ ] Forms tested
- [ ] Error handling works

---

## 📚 Resources

- **Vercel Docs:** https://vercel.com/docs
- **PlanetScale Docs:** https://planetscale.com/docs
- **Laravel Deployment:** https://laravel.com/docs/deployment
- **GitHub:** https://github.com

---

## 🆘 Troubleshooting

**Error: "Class not found"**
```
Solution: Add to vercel.json build command:
"buildCommand": "composer install --optimize-autoloader --no-dev && php artisan config:cache"
```

**Error: "Database connection failed"**
```
Solution: 
1. Check PlanetScale credentials
2. Verify environment variables in Vercel
3. Enable SSL: DB_SSLMODE=REQUIRED
```

**Error: "500 Internal Server Error"**
```
Solution:
1. Check Vercel function logs
2. Set APP_DEBUG=true temporarily
3. Check storage permissions
```

---

**Good luck bre!** 🚀

Kalo ada masalah, biasanya di:
1. Database credentials
2. Environment variables
3. APP_KEY configuration
