@extends('layouts.admin')

@section('title', 'Tambah Pelatihan - DigiSolusi')
@section('page-title', 'Tambah Pelatihan Baru')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.pelatihan') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 mb-6">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>

    <div class="bg-white rounded-xl shadow-lg p-8">
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.pelatihan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="nama_pelatihan" class="block text-gray-700 font-semibold mb-2">Nama Pelatihan</label>
                    <input type="text" id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <label for="instruktur" class="block text-gray-700 font-semibold mb-2">Instruktur</label>
                    <input type="text" id="instruktur" name="instruktur" value="{{ old('instruktur') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="durasi_jam" class="block text-gray-700 font-semibold mb-2">Durasi (Jam)</label>
                    <input type="number" id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam') }}" required min="1"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required min="0"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="kuota" class="block text-gray-700 font-semibold mb-2">Kuota Peserta</label>
                    <input type="number" id="kuota" name="kuota" value="{{ old('kuota') }}" required min="1"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="tanggal_mulai" class="block text-gray-700 font-semibold mb-2">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="tanggal_selesai" class="block text-gray-700 font-semibold mb-2">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="waktu" class="block text-gray-700 font-semibold mb-2">Waktu</label>
                    <input type="text" id="waktu" name="waktu" value="{{ old('waktu') }}" required placeholder="Contoh: 09:00 - 12:00"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="gambar" class="block text-gray-700 font-semibold mb-2">Gambar Pelatihan</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG. Maksimal 2MB</p>
                </div>
            </div>

            <div class="mt-8 flex items-center space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Simpan Pelatihan
                </button>
                <a href="{{ route('admin.pelatihan') }}" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
