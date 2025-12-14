@extends('layouts.app')

@section('title', 'Pelatihan - DigiSolusi')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Program Pelatihan Kami</h1>
        <p class="text-xl text-blue-100">Pilih pelatihan yang tepat untuk mengembangkan skill Anda</p>
    </div>
</div>

<!-- Pelatihan List -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($pelatihan->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($pelatihan as $item)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
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
                    @if($item->tersedia())
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-check mr-1"></i>Tersedia
                    </span>
                    @else
                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-times mr-1"></i>Penuh
                    </span>
                    @endif
                </div>
                
                <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">{{ $item->nama_pelatihan }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ $item->deskripsi }}</p>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-user-tie w-5 mr-2"></i>
                        <span>{{ $item->instruktur }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar w-5 mr-2"></i>
                        <span>{{ $item->tanggal_mulai->format('d M Y') }} - {{ $item->tanggal_selesai->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clock w-5 mr-2"></i>
                        <span>{{ $item->waktu }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users w-5 mr-2"></i>
                        <span>{{ $item->peserta_terdaftar }}/{{ $item->kuota }} Peserta</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="text-blue-600 font-bold text-xl">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </div>
                    <a href="{{ route('pelatihan.detail', $item->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $pelatihan->links() }}
    </div>
    @else
    <div class="text-center py-12">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada pelatihan tersedia saat ini</p>
    </div>
    @endif
</div>
@endsection
