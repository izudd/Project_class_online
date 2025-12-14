@extends('layouts.user')

@section('title', 'Kelas Saya - DigiSolusi')
@section('page-title', 'Kelas Saya')

@section('content')
@if($pendaftaran->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($pendaftaran as $item)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        @if($item->pelatihan->gambar)
        <img src="{{ asset('storage/' . $item->pelatihan->gambar) }}" alt="{{ $item->pelatihan->nama_pelatihan }}" class="w-full h-48 object-cover">
        @else
        <div class="w-full h-48 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center">
            <i class="fas fa-graduation-cap text-white text-6xl"></i>
        </div>
        @endif
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $item->pelatihan->durasi_jam }} Jam
                </span>
                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                    <i class="fas fa-check mr-1"></i>Aktif
                </span>
            </div>
            
            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->pelatihan->nama_pelatihan }}</h3>
            
            <div class="space-y-2 mb-4">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-user-tie w-5 mr-2"></i>
                    <span>{{ $item->pelatihan->instruktur }}</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-calendar w-5 mr-2"></i>
                    <span>{{ $item->pelatihan->tanggal_mulai->format('d M Y') }}</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-clock w-5 mr-2"></i>
                    <span>{{ $item->pelatihan->waktu }}</span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-gray-600">Progress</span>
                    <span class="text-sm font-semibold text-blue-600">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 0%"></div>
                </div>
            </div>
            
            <a href="{{ route('pelatihan.detail', $item->pelatihan->id) }}" class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Lihat Detail
            </a>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="bg-white rounded-xl shadow-lg p-12">
    <div class="text-center">
        <i class="fas fa-book-open text-gray-300 text-6xl mb-4"></i>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Kelas Aktif</h3>
        <p class="text-gray-600 mb-6">Anda belum terdaftar di kelas manapun yang diterima</p>
        <a href="{{ route('pelatihan') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            <i class="fas fa-search mr-2"></i>Cari Pelatihan
        </a>
    </div>
</div>
@endif
@endsection
