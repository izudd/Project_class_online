# 🚂 Deploy DigiSolusi ke Railway (RECOMMENDED)

## ✅ Kenapa Railway Lebih Baik untuk Laravel?

**Railway vs Vercel:**
- ✅ **Built-in MySQL** - Gak perlu setup database external
- ✅ **Persistent Storage** - Upload gambar gak hilang
- ✅ **Traditional Server** - Bukan serverless, lebih stabil
- ✅ **Free $5/month** credit
- ✅ **Super gampang** setup

---

## 📋 Prerequisites

1. **GitHub Account** - https://github.com
2. **Railway Account** - https://railway.app (login with GitHub)

---

## 🚀 STEP 1: Push ke GitHub

```powershell
# 1. Initialize Git
git init

# 2. Add all files
git add .

# 3. Commit
git commit -m "Initial commit - DigiSolusi Platform"

# 4. Create repo di GitHub: pelatihan-online

# 5. Add remote (ganti YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/pelatihan-online.git

# 6. Push
git branch -M main
git push -u origin main
```

---

## 🚂 STEP 2: Deploy ke Railway

### 2.1 Create New Project

```bash
# 1. Buka https://railway.app
# 2. Login with GitHub
# 3. Click "New Project"
# 4. Select "Deploy from GitHub repo"
# 5. Pilih "pelatihan-online"
# 6. Click "Deploy Now"
```

### 2.2 Add MySQL Database

```bash
# 1. Di Railway dashboard project
# 2. Click "New" → "Database" → "Add MySQL"
# 3. Wait 30 seconds
# 4. MySQL ready! ✅
```

### 2.3 Configure Environment Variables

Di Railway → pelatihan-online service → Variables:

```env
APP_NAME=DigiSolusi
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://pelatihan-online-production.up.railway.app

LOG_CHANNEL=stderr

# Database (auto-filled dari MySQL service)
# Atau copy dari MySQL → Connect → Laravel
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_DRIVER=database
QUEUE_CONNECTION=database

FILESYSTEM_DISK=public
```

**Generate APP_KEY:**
```powershell
# Di local:
php artisan key:generate --show

# Copy hasil: base64:xxxxx
# Paste ke Railway variable APP_KEY
```

### 2.4 Create Nixpacks Config

Railway butuh file ini. Buat file baru: `nixpacks.toml`

```toml
[phases.setup]
nixPkgs = ['php82', 'php82Packages.composer']

[phases.install]
cmds = ['composer install --no-dev --optimize-autoloader']

[phases.build]
cmds = [
    'php artisan config:cache',
    'php artisan route:cache',
    'php artisan view:cache'
]

[start]
cmd = 'php artisan serve --host=0.0.0.0 --port=${PORT:-8000}'
```

**Commit & push:**
```powershell
git add nixpacks.toml
git commit -m "Add nixpacks config"
git push
```

### 2.5 Run Migrations

Di Railway dashboard:

**Option A: Via Railway CLI**
```bash
# 1. Install Railway CLI
npm i -g @railway/cli

# 2. Login
railway login

# 3. Link project
railway link

# 4. Run migration
railway run php artisan migrate --force

# 5. Seed
railway run php artisan db:seed --force
```

**Option B: Manual SQL (seperti Vercel)**
```bash
# Connect ke MySQL database di Railway
# Run SQL migration manual (lihat VERCEL_DEPLOY.md)
```

---

## ✅ STEP 3: Verify

```bash
# 1. Buka URL Railway (misal: https://pelatihan-online-production.up.railway.app)
# 2. Login:
#    - Email: admin@digisolusi.com
#    - Password: password
# 3. Test semua fitur
```

---

## 🔄 Update Code

```powershell
# 1. Edit code
# 2. Commit
git add .
git commit -m "Update: fitur baru"

# 3. Push
git push

# 4. Railway auto-redeploy! ✅
```

---

## 💰 Pricing

**Railway Free Tier:**
- $5 credit per month (gratis)
- Cukup untuk 500+ hours/month
- Unlimited projects

**Upgrade kalo perlu:**
- $5/month untuk unlimited usage

---

## ⚙️ Advanced: Storage Link

Karena Railway persistent, upload gambar aman!

Tapi tetap perlu:
```bash
# Run via Railway CLI
railway run php artisan storage:link
```

Atau add ke build command di `nixpacks.toml`:
```toml
[phases.build]
cmds = [
    'php artisan config:cache',
    'php artisan route:cache',
    'php artisan view:cache',
    'php artisan storage:link'
]
```

---

## 🎯 Comparison

| Feature | Railway | Vercel |
|---------|---------|--------|
| Setup | ⭐⭐⭐⭐⭐ Super Easy | ⭐⭐⭐ Medium |
| Database | ✅ Built-in MySQL | ❌ External required |
| File Upload | ✅ Persistent | ❌ Temporary |
| Performance | ✅ Fast | ⚡ Serverless (cold start) |
| Price | 💰 $5/month credit | 💰 Free (limited) |
| Laravel Support | ✅ Native | ⚠️ Workaround |

**Winner for Laravel: Railway! 🏆**

---

## 📚 Resources

- **Railway Docs:** https://docs.railway.app
- **Railway Templates:** https://railway.app/templates
- **Railway CLI:** https://docs.railway.app/develop/cli

---

**Recommended: Pake Railway aja bre, jauh lebih gampang!** 🚂🔥
