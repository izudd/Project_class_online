@extends('layouts.admin')

@section('title', 'Edit Pelatihan - DigiSolusi')
@section('page-title', 'Edit Pelatihan')

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

        <form action="{{ route('admin.pelatihan.update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="nama_pelatihan" class="block text-gray-700 font-semibold mb-2">Nama Pelatihan</label>
                    <input type="text" id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan', $pelatihan->nama_pelatihan) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $pelatihan->deskripsi) }}</textarea>
                </div>

                <div>
                    <label for="instruktur" class="block text-gray-700 font-semibold mb-2">Instruktur</label>
                    <input type="text" id="instruktur" name="instruktur" value="{{ old('instruktur', $pelatihan->instruktur) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="durasi_jam" class="block text-gray-700 font-semibold mb-2">Durasi (Jam)</label>
                    <input type="number" id="durasi_jam" name="durasi_jam" value="{{ old('durasi_jam', $pelatihan->durasi_jam) }}" required min="1"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" value="{{ old('harga', $pelatihan->harga) }}" required min="0"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="kuota" class="block text-gray-700 font-semibold mb-2">Kuota Peserta</label>
                    <input type="number" id="kuota" name="kuota" value="{{ old('kuota', $pelatihan->kuota) }}" required min="1"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="tanggal_mulai" class="block text-gray-700 font-semibold mb-2">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pelatihan->tanggal_mulai->format('Y-m-d')) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="tanggal_selesai" class="block text-gray-700 font-semibold mb-2">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pelatihan->tanggal_selesai->format('Y-m-d')) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="waktu" class="block text-gray-700 font-semibold mb-2">Waktu</label>
                    <input type="text" id="waktu" name="waktu" value="{{ old('waktu', $pelatihan->waktu) }}" required placeholder="Contoh: 09:00 - 12:00"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="aktif" {{ old('status', $pelatihan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="penuh" {{ old('status', $pelatihan->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                        <option value="selesai" {{ old('status', $pelatihan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="gambar" class="block text-gray-700 font-semibold mb-2">Gambar Pelatihan</label>
                    @if($pelatihan->gambar)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $pelatihan->gambar) }}" alt="Current Image" class="w-48 h-32 object-cover rounded-lg">
                        <p class="text-sm text-gray-600 mt-1">Gambar saat ini</p>
                    </div>
                    @endif
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
                </div>
            </div>

            <div class="mt-8 flex items-center space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Update Pelatihan
                </button>
                <a href="{{ route('admin.pelatihan') }}" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
