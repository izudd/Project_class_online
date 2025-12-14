@extends('layouts.app')

@section('title', 'Home - DigiSolusi')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Tingkatkan Skill Digital Anda</h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">Platform pelatihan online terbaik untuk profesional masa depan</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('pelatihan') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg">
                    Lihat Pelatihan
                </a>
                @guest
                <a href="{{ route('register') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Daftar Sekarang
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Mengapa Pilih DigiSolusi?</h2>
        <p class="text-gray-600 text-lg">Platform pelatihan yang dirancang untuk kesuksesan Anda</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-chalkboard-teacher text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Instruktur Berpengalaman</h3>
            <p class="text-gray-600">Belajar dari para ahli di bidangnya dengan pengalaman industri yang terbukti</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-certificate text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Sertifikat Resmi</h3>
            <p class="text-gray-600">Dapatkan sertifikat yang diakui industri setelah menyelesaikan pelatihan</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-laptop-code text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Materi Praktis</h3>
            <p class="text-gray-600">Konten pembelajaran yang praktis dan langsung dapat diterapkan</p>
        </div>
    </div>
</div>

<!-- Pelatihan Terbaru -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Pelatihan Tersedia</h2>
            <p class="text-gray-600 text-lg">Pilih pelatihan yang sesuai dengan kebutuhan Anda</p>
        </div>

        @if($pelatihan->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pelatihan as $item)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_pelatihan }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-6xl"></i>
                </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $item->durasi_jam }} Jam
                        </span>
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-users mr-1"></i>{{ $item->peserta_terdaftar }}/{{ $item->kuota }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->nama_pelatihan }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($item->deskripsi, 100) }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-user-tie mr-1"></i>{{ $item->instruktur }}
                        </div>
                        <div class="text-blue-600 font-bold text-lg">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>
                    
                    <a href="{{ route('pelatihan.detail', $item->id) }}" class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('pelatihan') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Lihat Semua Pelatihan
            </a>
        </div>
        @else
        <div class="text-center py-12">
            <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada pelatihan tersedia</p>
        </div>
        @endif
    </div>
</div>

<!-- CTA Section -->
<div class="bg-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Perjalanan Belajar Anda?</h2>
        <p class="text-xl mb-8 text-blue-100">Bergabunglah dengan ribuan profesional yang telah meningkatkan karirnya</p>
        @guest
        <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition text-lg shadow-lg">
            Daftar Gratis Sekarang
        </a>
        @else
        <a href="{{ route('pelatihan') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition text-lg shadow-lg">
            Lihat Pelatihan Tersedia
        </a>
        @endguest
    </div>
</div>
@endsection
