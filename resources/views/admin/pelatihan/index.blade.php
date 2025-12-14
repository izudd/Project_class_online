@extends('layouts.admin')

@section('title', 'Kelola Pelatihan - DigiSolusi')
@section('page-title', 'Kelola Pelatihan')

@section('content')
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-lg mb-6">
    <div class="p-6 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Daftar Pelatihan</h3>
            <p class="text-gray-600 text-sm">Kelola semua program pelatihan</p>
        </div>
        <a href="{{ route('admin.pelatihan.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Pelatihan
        </a>
    </div>
    
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 text-sm border-b border-gray-200">
                        <th class="pb-3 font-semibold">Pelatihan</th>
                        <th class="pb-3 font-semibold">Instruktur</th>
                        <th class="pb-3 font-semibold">Jadwal</th>
                        <th class="pb-3 font-semibold">Peserta</th>
                        <th class="pb-3 font-semibold">Harga</th>
                        <th class="pb-3 font-semibold">Status</th>
                        <th class="pb-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($pelatihan as $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-4">
                            <div class="flex items-center">
                                @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_pelatihan }}" class="w-12 h-12 rounded-lg object-cover mr-3">
                                @else
                                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                @endif
                                <div>
                                    <p class="font-semibold">{{ $item->nama_pelatihan }}</p>
                                    <p class="text-sm text-gray-500">{{ $item->durasi_jam }} Jam</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4">{{ $item->instruktur }}</td>
                        <td class="py-4">
                            <div class="text-sm">
                                <p>{{ $item->tanggal_mulai->format('d M Y') }}</p>
                                <p class="text-gray-500">{{ $item->waktu }}</p>
                            </div>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <i class="fas fa-users text-gray-400 mr-2"></i>
                                <span>{{ $item->peserta_terdaftar }}/{{ $item->kuota }}</span>
                            </div>
                        </td>
                        <td class="py-4 font-semibold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="py-4">
                            @if($item->status === 'aktif')
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                                Aktif
                            </span>
                            @elseif($item->status === 'penuh')
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">
                                Penuh
                            </span>
                            @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm font-semibold">
                                Selesai
                            </span>
                            @endif
                        </td>
                        <td class="py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.pelatihan.edit', $item->id) }}" class="text-blue-600 hover:text-blue-700 p-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pelatihan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelatihan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 p-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $pelatihan->links() }}
        </div>
    </div>
</div>
@endsection
