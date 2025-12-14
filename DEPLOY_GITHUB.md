# 🚀 Quick Deploy Guide - GitHub ke Online

## 🎯 Pilih Platform Deployment

### Option 1: Railway (RECOMMENDED) ⭐
✅ **Paling Gampang untuk Laravel**
- Setup 5 menit
- MySQL built-in
- File upload persistent
- $5/month credit gratis

👉 **Lihat:** `RAILWAY_DEPLOY.md`

### Option 2: Vercel
⚠️ **Butuh Setup Extra**
- Serverless (agak tricky)
- Database external (PlanetScale)
- Upload gambar temporary

👉 **Lihat:** `VERCEL_DEPLOY.md`

---

## 📦 STEP 1: Push ke GitHub

### 1.1 Create GitHub Repository

```bash
1. Buka: https://github.com/new
2. Repository name: pelatihan-online
3. Description: Platform Pelatihan Online - DigiSolusi
4. Public/Private: (pilih sesuai kebutuhan)
5. DON'T check "Initialize with README"
6. Click "Create repository"
```

### 1.2 Push Code

Di PowerShell (folder project):

```powershell
# Initialize Git
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit - DigiSolusi Platform"

# Add remote (GANTI YOUR_USERNAME dengan username GitHub lu)
git remote add origin https://github.com/YOUR_USERNAME/pelatihan-online.git

# Push
git branch -M main
git push -u origin main
```

**Kalo diminta login:**
```powershell
# Username: github_username_lu
# Password: Personal Access Token (bukan password GitHub!)

# Cara buat Token:
# 1. GitHub → Settings → Developer settings
# 2. Personal access tokens → Tokens (classic)
# 3. Generate new token
# 4. Scope: pilih 'repo'
# 5. Copy token, paste pas diminta password
```

---

## 🚂 STEP 2: Deploy ke Railway (Recommended)

### Quick Steps:

```bash
1. Buka: https://railway.app
2. Login with GitHub
3. New Project → Deploy from GitHub repo
4. Pilih: pelatihan-online
5. Click Deploy

6. Add MySQL:
   - Click "New" → Database → MySQL
   - Wait 30 seconds

7. Configure Variables:
   - Click service → Variables tab
   - Add:
     * APP_KEY (generate: php artisan key:generate --show)
     * APP_URL=https://your-url.up.railway.app
     * APP_ENV=production
     * APP_DEBUG=false
   
8. Database auto-connected! ✅

9. Run migration via Railway CLI:
   npm i -g @railway/cli
   railway login
   railway link
   railway run php artisan migrate --force
   railway run php artisan db:seed --force

10. Done! Buka URL Railway ✅
```

**Default Login:**
- Email: admin@digisolusi.com
- Password: password

---

## 🔄 Update/Redeploy (Setelah Setup)

Setiap kali ada perubahan:

```powershell
# 1. Edit code
# 2. Save

# 3. Commit & push
git add .
git commit -m "Update: deskripsi perubahan"
git push

# 4. Railway/Vercel auto-redeploy! ✅
```

---

## 📚 Full Guides

- **Railway Deployment:** `RAILWAY_DEPLOY.md` (RECOMMENDED)
- **Vercel Deployment:** `VERCEL_DEPLOY.md` (Advanced)
- **GitHub Setup:** Lihat di atas ☝️

---

## ⚠️ Troubleshooting

**Error: Git not found**
```powershell
# Install Git: https://git-scm.com/download/win
# Restart PowerShell
```

**Error: Permission denied**
```powershell
# Use Personal Access Token instead of password
# GitHub → Settings → Developer settings → PAT
```

**Error: Failed to push**
```powershell
# Check remote
git remote -v

# Re-add remote
git remote remove origin
git remote add origin https://github.com/YOUR_USERNAME/pelatihan-online.git
git push -u origin main
```

**Error: Migration failed**
```bash
# Via Railway CLI:
railway run php artisan migrate:fresh --force
railway run php artisan db:seed --force
```

---

## 🎯 Quick Checklist

**GitHub:**
- [ ] Repository created
- [ ] Code pushed to main branch
- [ ] All files uploaded

**Railway/Vercel:**
- [ ] Account created
- [ ] Project deployed
- [ ] Database setup
- [ ] Environment variables configured
- [ ] APP_KEY generated
- [ ] Migrations run
- [ ] Website accessible
- [ ] Login tested

---

**Selamat! Website udah online! 🎉**

Share link nya ke temen-temen:
```
https://your-project.railway.app
atau
https://your-project.vercel.app
```

---

## 💡 Pro Tips

1. **Custom Domain:**
   - Railway/Vercel support custom domain gratis
   - Setting → Domains → Add custom domain

2. **Auto Deploy:**
   - Setiap push ke GitHub = auto deploy
   - Gak perlu manual redeploy

3. **Environment Variables:**
   - Jangan commit `.env` ke GitHub!
   - Set di Railway/Vercel dashboard

4. **Database Backup:**
   - Railway/PlanetScale: auto backup
   - Export manual via dashboard

5. **Monitoring:**
   - Railway: Built-in metrics
   - Vercel: Analytics dashboard

---

**Happy Deployment! 🚀**
