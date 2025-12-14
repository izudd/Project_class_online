@extends('layouts.app')

@section('title', $pelatihan->nama_pelatihan . ' - DigiSolusi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Back Button -->
    <a href="{{ route('pelatihan') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 mb-6">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Pelatihan
    </a>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Image -->
            @if($pelatihan->gambar)
            <img src="{{ asset('storage/' . $pelatihan->gambar) }}" alt="{{ $pelatihan->nama_pelatihan }}" class="w-full h-96 object-cover rounded-xl mb-6">
            @else
            <div class="w-full h-96 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center rounded-xl mb-6">
                <i class="fas fa-graduation-cap text-white text-9xl"></i>
            </div>
            @endif

            <!-- Title & Status -->
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $pelatihan->nama_pelatihan }}</h1>
                    <div class="flex items-center space-x-3">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $pelatihan->durasi_jam }} Jam
                        </span>
                        @if($pelatihan->tersedia())
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-check mr-1"></i>Tersedia
                        </span>
                        @else
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-times mr-1"></i>Penuh
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Deskripsi Pelatihan</h2>
                <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $pelatihan->deskripsi }}</p>
            </div>

            <!-- What You'll Learn -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Yang Akan Anda Pelajari</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Pemahaman konsep dasar hingga advanced</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Praktek langsung dengan studi kasus nyata</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Mendapatkan sertifikat resmi setelah selesai</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600">Akses ke materi pembelajaran selamanya</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <!-- Pricing Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6 sticky top-24">
                <div class="text-center mb-6">
                    <div class="text-gray-600 text-sm mb-2">Harga Pelatihan</div>
                    <div class="text-blue-600 text-4xl font-bold">
                        Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}
                    </div>
                </div>

                <!-- Info List -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-user-tie w-5 mr-3"></i>
                        <span class="text-sm">{{ $pelatihan->instruktur }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar w-5 mr-3"></i>
                        <span class="text-sm">{{ $pelatihan->tanggal_mulai->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-check w-5 mr-3"></i>
                        <span class="text-sm">{{ $pelatihan->tanggal_selesai->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-clock w-5 mr-3"></i>
                        <span class="text-sm">{{ $pelatihan->waktu }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-users w-5 mr-3"></i>
                        <span class="text-sm">{{ $pelatihan->peserta_terdaftar }}/{{ $pelatihan->kuota }} Peserta</span>
                    </div>
                </div>

                <!-- Enroll Button -->
                @auth
                    @if($pelatihan->tersedia())
                    <form action="{{ route('pelatihan.daftar', $pelatihan->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            <i class="fas fa-check mr-2"></i>Daftar Sekarang
                        </button>
                    </form>
                    @else
                    <button disabled class="w-full bg-gray-400 text-white py-3 rounded-lg font-semibold cursor-not-allowed">
                        <i class="fas fa-times mr-2"></i>Pelatihan Penuh
                    </button>
                    @endif
                @else
                <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Daftar
                </a>
                @endauth

                <!-- Features -->
                <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-certificate text-blue-600 mr-3"></i>
                        Sertifikat Resmi
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-infinity text-blue-600 mr-3"></i>
                        Akses Selamanya
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-headset text-blue-600 mr-3"></i>
                        Support 24/7
                    </div>
                </div>
            </div>

            <!-- Share -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="font-bold text-gray-800 mb-3">Bagikan Pelatihan Ini</h3>
                <div class="flex space-x-2">
                    <a href="#" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="flex-1 bg-blue-400 text-white text-center py-2 rounded-lg hover:bg-blue-500 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="flex-1 bg-green-500 text-white text-center py-2 rounded-lg hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
