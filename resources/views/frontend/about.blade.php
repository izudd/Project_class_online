@extends('layouts.app')

@section('title', 'About Us - DigiSolusi')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang DigiSolusi</h1>
        <p class="text-xl text-blue-100">Platform pelatihan online terpercaya untuk masa depan digital</p>
    </div>
</div>

<!-- About Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Mission Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-20">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Misi Kami</h2>
            <p class="text-gray-600 text-lg mb-4">
                DigiSolusi hadir untuk memberikan akses pembelajaran digital yang berkualitas bagi semua kalangan. 
                Kami percaya bahwa setiap orang berhak mendapatkan pendidikan yang terbaik untuk mengembangkan 
                karir dan potensi mereka.
            </p>
            <p class="text-gray-600 text-lg">
                Dengan instruktur berpengalaman dan kurikulum yang selalu update dengan kebutuhan industri, 
                kami berkomitmen untuk mencetak profesional digital yang kompeten dan siap bersaing.
            </p>
        </div>
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-12 text-white">
            <div class="space-y-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">5000+</div>
                        <div class="text-blue-100">Peserta Aktif</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">50+</div>
                        <div class="text-blue-100">Program Pelatihan</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-award text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">95%</div>
                        <div class="text-blue-100">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Nilai-Nilai Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Inovasi</h3>
                <p class="text-gray-600">Selalu menghadirkan metode pembelajaran terbaru dan teknologi terkini</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-star text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Kualitas</h3>
                <p class="text-gray-600">Menjaga standar tinggi dalam setiap program pelatihan yang kami tawarkan</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Integritas</h3>
                <p class="text-gray-600">Berkomitmen pada kejujuran dan transparansi dalam setiap aspek layanan</p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Tim Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user text-white text-4xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-1">John Doe</h3>
                <p class="text-gray-600 text-sm">CEO & Founder</p>
            </div>
            
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user text-white text-4xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-1">Jane Smith</h3>
                <p class="text-gray-600 text-sm">Head of Education</p>
            </div>
            
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user text-white text-4xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-1">Mike Johnson</h3>
                <p class="text-gray-600 text-sm">Lead Instructor</p>
            </div>
            
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user text-white text-4xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-1">Sarah Williams</h3>
                <p class="text-gray-600 text-sm">Community Manager</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Bergabunglah dengan Kami</h2>
        <p class="text-xl mb-8 text-blue-100">Mulai perjalanan pembelajaran Anda bersama DigiSolusi</p>
        @guest
        <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition text-lg shadow-lg">
            Daftar Sekarang
        </a>
        @else
        <a href="{{ route('pelatihan') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition text-lg shadow-lg">
            Lihat Pelatihan
        </a>
        @endguest
    </div>
</div>
@endsection
