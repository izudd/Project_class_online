@extends('layouts.user')

@section('title', 'Dashboard - DigiSolusi')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Total Pendaftaran -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Pendaftaran</p>
                <p class="text-3xl font-bold text-gray-800">{{ $pendaftaran->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Kelas Diterima -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Kelas Diterima</p>
                <p class="text-3xl font-bold text-green-600">{{ $pendaftaran->where('status', 'diterima')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Menunggu Konfirmasi -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Pending</p>
                <p class="text-3xl font-bold text-yellow-600">{{ $pendaftaran->where('status', 'pending')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Pendaftaran -->
<div class="bg-white rounded-xl shadow-lg">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-gray-800">Riwayat Pendaftaran</h3>
    </div>
    
    @if($pendaftaran->count() > 0)
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 text-sm border-b border-gray-200">
                        <th class="pb-3 font-semibold">Pelatihan</th>
                        <th class="pb-3 font-semibold">Tanggal Daftar</th>
                        <th class="pb-3 font-semibold">Mulai</th>
                        <th class="pb-3 font-semibold">Status</th>
                        <th class="pb-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($pendaftaran as $item)
                    <tr class="border-b border-gray-100">
                        <td class="py-4">
                            <div>
                                <p class="font-semibold">{{ $item->pelatihan->nama_pelatihan }}</p>
                                <p class="text-sm text-gray-500">{{ $item->pelatihan->instruktur }}</p>
                            </div>
                        </td>
                        <td class="py-4">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="py-4">{{ $item->pelatihan->tanggal_mulai->format('d M Y') }}</td>
                        <td class="py-4">
                            @if($item->status === 'pending')
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                            @elseif($item->status === 'diterima')
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-check mr-1"></i>Diterima
                            </span>
                            @else
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-times mr-1"></i>Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="py-4">
                            <a href="{{ route('pelatihan.detail', $item->pelatihan->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="p-12 text-center">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <p class="text-gray-500 text-lg mb-4">Belum ada pendaftaran</p>
        <a href="{{ route('pelatihan') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            Lihat Pelatihan Tersedia
        </a>
    </div>
    @endif
</div>
@endsection
