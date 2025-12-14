<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin DigiSolusi',
            'email' => 'admin@digisolusi.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jakarta, Indonesia',
        ]);

        // Create Test User
        User::create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081234567891',
            'address' => 'Jakarta, Indonesia',
        ]);

        // Create Sample Pelatihan
        Pelatihan::create([
            'nama_pelatihan' => 'Web Development Fundamental',
            'deskripsi' => 'Pelajari dasar-dasar web development dari HTML, CSS, JavaScript hingga framework modern. Cocok untuk pemula yang ingin memulai karir sebagai web developer.',
            'instruktur' => 'John Doe',
            'durasi_jam' => 40,
            'harga' => 1500000,
            'kuota' => 30,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(7),
            'tanggal_selesai' => now()->addDays(37),
            'waktu' => '09:00 - 12:00',
            'status' => 'aktif',
        ]);

        Pelatihan::create([
            'nama_pelatihan' => 'Digital Marketing Strategy',
            'deskripsi' => 'Kuasai strategi digital marketing modern termasuk SEO, SEM, Social Media Marketing, dan Content Marketing. Dapatkan skill yang dibutuhkan industri.',
            'instruktur' => 'Jane Smith',
            'durasi_jam' => 30,
            'harga' => 1200000,
            'kuota' => 25,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(10),
            'tanggal_selesai' => now()->addDays(35),
            'waktu' => '13:00 - 16:00',
            'status' => 'aktif',
        ]);

        Pelatihan::create([
            'nama_pelatihan' => 'UI/UX Design Mastery',
            'deskripsi' => 'Belajar membuat design interface yang user-friendly dan menarik. Dari riset user, wireframe, prototyping hingga design system.',
            'instruktur' => 'Mike Johnson',
            'durasi_jam' => 35,
            'harga' => 1800000,
            'kuota' => 20,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(14),
            'tanggal_selesai' => now()->addDays(49),
            'waktu' => '09:00 - 12:00',
            'status' => 'aktif',
        ]);

        Pelatihan::create([
            'nama_pelatihan' => 'Data Science with Python',
            'deskripsi' => 'Pelajari analisis data menggunakan Python. Mulai dari data cleaning, visualization, machine learning hingga deployment model.',
            'instruktur' => 'Sarah Williams',
            'durasi_jam' => 50,
            'harga' => 2500000,
            'kuota' => 15,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(21),
            'tanggal_selesai' => now()->addDays(71),
            'waktu' => '13:00 - 17:00',
            'status' => 'aktif',
        ]);

        Pelatihan::create([
            'nama_pelatihan' => 'Mobile App Development',
            'deskripsi' => 'Belajar membuat aplikasi mobile native menggunakan Flutter. Dari UI design, state management hingga deployment ke Play Store & App Store.',
            'instruktur' => 'David Brown',
            'durasi_jam' => 45,
            'harga' => 2000000,
            'kuota' => 20,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(28),
            'tanggal_selesai' => now()->addDays(63),
            'waktu' => '09:00 - 13:00',
            'status' => 'aktif',
        ]);

        Pelatihan::create([
            'nama_pelatihan' => 'Cloud Computing with AWS',
            'deskripsi' => 'Kuasai Amazon Web Services untuk deploy dan manage aplikasi di cloud. Termasuk EC2, S3, RDS, Lambda dan services lainnya.',
            'instruktur' => 'Robert Taylor',
            'durasi_jam' => 40,
            'harga' => 2200000,
            'kuota' => 18,
            'peserta_terdaftar' => 0,
            'tanggal_mulai' => now()->addDays(35),
            'tanggal_selesai' => now()->addDays(70),
            'waktu' => '14:00 - 18:00',
            'status' => 'aktif',
        ]);
    }
}
