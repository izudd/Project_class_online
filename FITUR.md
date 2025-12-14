# 📚 Dokumentasi Fitur - DigiSolusi Platform

## 🎯 Overview Sistem

**DigiSolusi** adalah platform pelatihan online yang menyediakan sistem manajemen lengkap untuk:
- User: Mendaftar dan mengikuti pelatihan
- Admin: Mengelola pelatihan dan pendaftaran

---

## 🌐 FRONTEND (Public Pages)

### 1. Homepage (`/`)
**Fitur:**
- Hero section dengan CTA buttons
- Section "Mengapa Pilih DigiSolusi" (3 cards)
- Daftar 6 pelatihan terbaru
- CTA section untuk registrasi

**Design:**
- Gradient blue background
- Modern card design
- Responsive grid layout
- Icon-rich interface

### 2. About Us (`/about`)
**Fitur:**
- Mission statement
- Statistik platform (5000+ peserta, 50+ program, 95% satisfaction)
- Core values (Inovasi, Kualitas, Integritas)
- Team members showcase

**Design:**
- Professional gradient cards
- Icon-based statistics
- Grid layout untuk values
- Circular avatar placeholders

### 3. Pelatihan List (`/pelatihan`)
**Fitur:**
- Grid layout semua pelatihan
- Filter by status (Tersedia/Penuh)
- Informasi lengkap: instruktur, jadwal, harga, kuota
- Pagination
- Progress indicator

**Card Information:**
- Gambar/icon pelatihan
- Durasi dalam jam
- Status availability
- Deskripsi singkat
- Harga
- Detail button

### 4. Pelatihan Detail (`/pelatihan/{id}`)
**Fitur:**
- Gambar besar pelatihan
- Deskripsi lengkap
- "What You'll Learn" section
- Sticky sidebar dengan info:
  - Harga
  - Instruktur
  - Jadwal lengkap
  - Kuota peserta
  - Button pendaftaran
- Social share buttons

**Logic:**
- Auto-hide daftar button jika penuh
- Redirect ke login jika belum login
- Prevent double registration

### 5. Contact (`/contact`)
**Fitur:**
- Contact form (nama, email, message)
- Validation
- Success message
- Informasi kontak lengkap:
  - Alamat
  - Telepon
  - Email
  - Jam operasional
- Social media links
- Map placeholder

---

## 👤 USER DASHBOARD

### 1. Dashboard (`/dashboard`)
**Fitur:**
- Statistics cards:
  - Total pendaftaran
  - Kelas diterima
  - Pending approval
- Riwayat pendaftaran table:
  - Nama pelatihan
  - Tanggal daftar
  - Status (Pending/Diterima/Ditolak)
  - Action buttons

**Design:**
- Sidebar navigation
- Color-coded status badges
- Responsive table

### 2. Profile (`/profile`)
**Fitur:**
- Avatar dengan initial
- Member since date
- Form edit profile:
  - Nama
  - Email
  - Nomor telepon
  - Alamat
- Form ubah password:
  - Current password
  - New password
  - Confirm password
- Validation & error handling

### 3. Kelas Saya (`/kelas-saya`)
**Fitur:**
- Grid layout kelas aktif
- Progress bar (0-100%)
- Informasi kelas:
  - Instruktur
  - Jadwal
  - Waktu
- Link ke detail pelatihan

**Logic:**
- Hanya tampil kelas dengan status "diterima"
- Empty state jika belum ada kelas

### Pendaftaran Pelatihan
**Flow:**
1. User lihat detail pelatihan
2. Klik "Daftar Sekarang"
3. System check:
   - User sudah login?
   - Kuota masih ada?
   - User belum terdaftar?
4. Create pendaftaran dengan status "pending"
5. Redirect dengan success message

---

## 👨‍💼 ADMIN DASHBOARD

### 1. Dashboard Overview (`/admin/dashboard`)
**Fitur:**
- 4 Statistics cards:
  - Total Pelatihan
  - Total Pendaftar
  - Pelatihan Aktif
  - Jadwal Hari Ini
- Jadwal pelatihan hari ini (real-time)
- Quick actions:
  - Tambah pelatihan baru
  - Kelola pendaftaran
- System info panel

**Logic:**
- Filter pelatihan by date range
- Auto-update statistics
- Highlight pending registrations

### 2. Kelola Pelatihan (`/admin/pelatihan`)

#### Index Page
**Fitur:**
- Table view semua pelatihan:
  - Thumbnail image
  - Nama & durasi
  - Instruktur
  - Jadwal & waktu
  - Peserta (current/quota)
  - Harga
  - Status badge
  - Action buttons (Edit/Delete)
- Add new button
- Pagination

#### Create Form (`/admin/pelatihan/create`)
**Fields:**
- Nama pelatihan*
- Deskripsi* (textarea)
- Instruktur*
- Durasi (jam)*
- Harga*
- Kuota peserta*
- Tanggal mulai*
- Tanggal selesai*
- Waktu* (text: "09:00 - 12:00")
- Status* (select: Aktif/Penuh/Selesai)
- Gambar (optional, max 2MB)

**Validation:**
- All required fields
- Date range validation
- Image format & size
- Price > 0

#### Edit Form (`/admin/pelatihan/{id}/edit`)
**Fitur:**
- Pre-filled form
- Current image preview
- Update or keep existing image
- Delete confirmation

**Logic:**
- Update all fields
- Handle image upload/replacement
- Keep peserta_terdaftar intact

### 3. Kelola Pendaftaran (`/admin/pendaftaran`)
**Fitur:**
- Table view pendaftaran:
  - User info (nama, email)
  - Pelatihan info
  - Tanggal daftar
  - Status badge
  - Catatan admin
  - Update button
- Modal untuk update status:
  - Select status (Pending/Diterima/Ditolak)
  - Text area catatan
- Auto-update kuota pelatihan

**Logic:**
- Saat status → "diterima": `peserta_terdaftar++`
- Saat diterima → ditolak: `peserta_terdaftar--`
- Notification to user (future: email)

---

## 🔐 AUTHENTICATION

### Login (`/login`)
**Fitur:**
- Email & password
- Remember me checkbox
- Forgot password link
- Redirect to dashboard after login
- Role-based redirect:
  - Admin → `/admin/dashboard`
  - User → `/dashboard`

### Register (`/register`)
**Fields:**
- Nama lengkap*
- Email*
- Nomor telepon (optional)
- Alamat (optional)
- Password* (min 8 chars)
- Confirm password*

**Validation:**
- Email unique check
- Password strength
- Password match

### Logout
**Fitur:**
- Session destroy
- Token regenerate
- Redirect to home

---

## 🗄️ DATABASE STRUCTURE

### Users Table
```
- id (PK)
- name
- email (unique)
- email_verified_at
- password
- role (enum: admin, user)
- phone
- address
- remember_token
- timestamps
```

### Pelatihan Table
```
- id (PK)
- nama_pelatihan
- deskripsi (text)
- instruktur
- durasi_jam (int)
- harga (decimal 10,2)
- kuota (int)
- peserta_terdaftar (int, default 0)
- tanggal_mulai (date)
- tanggal_selesai (date)
- waktu (string)
- status (enum: aktif, penuh, selesai)
- gambar (nullable)
- timestamps
```

### Pendaftaran Table
```
- id (PK)
- user_id (FK → users.id)
- pelatihan_id (FK → pelatihan.id)
- status (enum: pending, diterima, ditolak)
- catatan (text, nullable)
- timestamps
```

---

## 🎨 DESIGN SYSTEM

### Colors
- **Primary**: Blue 600 (#2563EB)
- **Secondary**: Gray 800 (#1F2937)
- **Success**: Green 600 (#16A34A)
- **Warning**: Yellow 600 (#CA8A04)
- **Danger**: Red 600 (#DC2626)

### Typography
- **Headings**: Bold, Gray 800
- **Body**: Normal, Gray 700
- **Labels**: Semibold, Gray 700
- **Muted**: Gray 500/600

### Components
- **Cards**: White bg, rounded-xl, shadow-lg
- **Buttons**: Rounded-lg, font-semibold, transition
- **Inputs**: Border gray-300, rounded-lg, focus:ring-2
- **Badges**: Rounded-full, px-3 py-1, font-semibold

### Responsive Breakpoints
- **sm**: 640px
- **md**: 768px
- **lg**: 1024px
- **xl**: 1280px

---

## 🔒 SECURITY FEATURES

1. **Authentication**
   - Laravel Sanctum
   - Password hashing (bcrypt)
   - CSRF protection

2. **Authorization**
   - Role-based access (Admin/User)
   - Middleware protection
   - Route guarding

3. **Validation**
   - Server-side validation
   - Input sanitization
   - File upload validation

4. **Data Protection**
   - SQL injection prevention (Eloquent ORM)
   - XSS protection
   - HTTPS ready

---

## 📱 RESPONSIVE DESIGN

### Mobile (< 768px)
- Hamburger menu
- Stacked layouts
- Full-width cards
- Touch-friendly buttons

### Tablet (768px - 1024px)
- 2-column grids
- Collapsible sidebar
- Optimized spacing

### Desktop (> 1024px)
- 3-4 column grids
- Fixed sidebar
- Maximum content width
- Hover effects

---

## 🚀 FUTURE ENHANCEMENTS

### Phase 2
- [ ] Email notifications
- [ ] Payment gateway integration
- [ ] Certificate generation
- [ ] Course materials upload
- [ ] Video streaming

### Phase 3
- [ ] Live chat support
- [ ] Quiz & assignments
- [ ] Progress tracking
- [ ] Analytics dashboard
- [ ] Mobile app (Flutter)

### Phase 4
- [ ] Multi-language support
- [ ] AI-powered recommendations
- [ ] Gamification
- [ ] Social features
- [ ] API for third-party integrations

---

## 📊 METRICS & ANALYTICS

**Tracking Points:**
- Total users registered
- Active enrollments
- Course completion rate
- Popular courses
- Revenue tracking
- User engagement

**Future Integration:**
- Google Analytics
- Custom analytics dashboard
- Export reports (PDF/Excel)

---

Dibuat dengan ❤️ menggunakan Laravel 11 & Tailwind CSS
