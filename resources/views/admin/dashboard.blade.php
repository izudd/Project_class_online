@extends('layouts.admin')

@section('title', 'Admin Dashboard - DigiSolusi')
@section('page-title', 'Dashboard Overview')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Pelatihan</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalPelatihan }}</p>
                <p class="text-green-600 text-sm mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>{{ $pelatihanAktif }} Aktif
                </p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Pendaftar</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalPendaftar }}</p>
                <p class="text-yellow-600 text-sm mt-1">
                    <i class="fas fa-clock mr-1"></i>{{ $pendaftaranPending }} Pending
                </p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Pelatihan Aktif</p>
                <p class="text-3xl font-bold text-green-600">{{ $pelatihanAktif }}</p>
                <p class="text-gray-500 text-sm mt-1">Sedang berjalan</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-book-open text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Jadwal Hari Ini</p>
                <p class="text-3xl font-bold text-purple-600">{{ $jadwalHariIni->count() }}</p>
                <p class="text-gray-500 text-sm mt-1">Pelatihan berjalan</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-day text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Jadwal Hari Ini -->
<div class="bg-white rounded-xl shadow-lg mb-6">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-gray-800">Jadwal Pelatihan Hari Ini</h3>
        <p class="text-gray-600 text-sm">{{ now()->format('l, d F Y') }}</p>
    </div>
    
    @if($jadwalHariIni->count() > 0)
    <div class="p-6">
        <div class="space-y-4">
            @foreach($jadwalHariIni as $pelatihan)
            <div class="border-l-4 border-blue-500 bg-blue-50 p-4 rounded-r-lg">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800 mb-1">{{ $pelatihan->nama_pelatihan }}</h4>
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-user-tie mr-2"></i>
                                {{ $pelatihan->instruktur }}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2"></i>
                                {{ $pelatihan->waktu }}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users mr-2"></i>
                                {{ $pelatihan->peserta_terdaftar }}/{{ $pelatihan->kuota }} Peserta
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-check mr-1"></i>Aktif
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="p-12 text-center">
        <i class="fas fa-calendar-times text-gray-300 text-6xl mb-4"></i>
        <p class="text-gray-500 text-lg">Tidak ada jadwal pelatihan hari ini</p>
    </div>
    @endif
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.pelatihan.create') }}" class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-3">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="font-semibold text-gray-800">Tambah Pelatihan Baru</span>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>

            <a href="{{ route('admin.pendaftaran') }}" class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-yellow-600 rounded-lg flex items-center justify-center text-white mr-3">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <span class="font-semibold text-gray-800">Kelola Pendaftaran</span>
                </div>
                @if($pendaftaranPending > 0)
                <span class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $pendaftaranPending }}
                </span>
                @else
                <i class="fas fa-chevron-right text-gray-400"></i>
                @endif
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg p-6 text-white">
        <h3 class="text-xl font-bold mb-4">Sistem Info</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-blue-100">Platform</span>
                <span class="font-semibold">DigiSolusi v1.0</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-blue-100">Admin</span>
                <span class="font-semibold">{{ auth()->user()->name }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-blue-100">Last Login</span>
                <span class="font-semibold">{{ now()->format('d M Y H:i') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
