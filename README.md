# DigiSolusi - Platform Pelatihan Online

Website sistem manajemen layanan dan pelatihan online yang dibangun dengan Laravel 11 dan Tailwind CSS.

## 📋 Fitur

### Frontend (Public)
- **Home** - Landing page dengan overview pelatihan
- **About Us** - Informasi tentang DigiSolusi
- **Pelatihan** - Daftar semua pelatihan tersedia
- **Detail Pelatihan** - Informasi lengkap pelatihan
- **Contact** - Form kontak

### Backend (User Dashboard)
- **Dashboard** - Overview pendaftaran user
- **Profile** - Update profile & password
- **Kelas Saya** - Daftar kelas yang sudah diterima
- **Pendaftaran** - Daftar ke pelatihan baru

### Admin Dashboard
- **Overview Dashboard** - Statistik total pelatihan, pendaftar, dan jadwal hari ini
- **Kelola Pelatihan** - CRUD pelatihan (Create, Read, Update, Delete)
- **Kelola Pendaftaran** - Approve/reject pendaftaran user

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Tailwind CSS, Font Awesome
- **Database**: MySQL
- **Authentication**: Laravel Breeze (built-in)

## 📦 Installation

### 1. Clone Repository
```bash
cd pelatihan-online
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pelatihan_online
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed
```

### 6. Storage Link (untuk upload gambar)
```bash
php artisan storage:link
```

### 7. Start Development Server
```bash
php artisan serve
```

Website akan berjalan di: `http://localhost:8000`

## 👥 Default Users

### Admin
- Email: `admin@digisolusi.com`
- Password: `password`

### User
- Email: `user@test.com`
- Password: `password`

## 📁 Struktur Project

```
pelatihan-online/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── AuthController.php
│   │   │   ├── UserDashboardController.php
│   │   │   └── AdminController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Pelatihan.php
│       └── Pendaftaran.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php (Frontend)
│       │   ├── user.blade.php (User Dashboard)
│       │   └── admin.blade.php (Admin Dashboard)
│       ├── frontend/
│       ├── user/
│       ├── admin/
│       └── auth/
└── routes/
    └── web.php
```

## 🔑 Middleware Configuration

Tambahkan middleware di `bootstrap/app.php`:

```php
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
```

## 📊 Database Schema

### Users
- id, name, email, password, role, phone, address

### Pelatihan
- id, nama_pelatihan, deskripsi, instruktur, durasi_jam, harga, kuota, peserta_terdaftar, tanggal_mulai, tanggal_selesai, waktu, status, gambar

### Pendaftaran
- id, user_id, pelatihan_id, status, catatan

## 🎨 Design Features

- ✅ Responsive Design (Mobile, Tablet, Desktop)
- ✅ Modern UI dengan Tailwind CSS
- ✅ Gradient & Shadow Effects
- ✅ Icon-rich Interface (Font Awesome)
- ✅ Professional Color Scheme (Blue Theme)

## 🚀 Deployment Tips

### Production Checklist
1. Set `APP_ENV=production` di `.env`
2. Set `APP_DEBUG=false`
3. Optimize autoloader: `composer install --optimize-autoloader --no-dev`
4. Cache config: `php artisan config:cache`
5. Cache routes: `php artisan route:cache`
6. Cache views: `php artisan view:cache`

## 📝 License

Project ini dibuat untuk tujuan pembelajaran dan dapat digunakan secara bebas.

## 🤝 Contributing

Feel free to fork dan submit pull request untuk improvement!

## 📞 Support

Untuk pertanyaan atau issue, silakan hubungi:
- Email: info@digisolusi.com
- Website: https://digisolusi.com
