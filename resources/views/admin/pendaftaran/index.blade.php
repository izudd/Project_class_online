@extends('layouts.admin')

@section('title', 'Kelola Pendaftaran - DigiSolusi')
@section('page-title', 'Kelola Pendaftaran')

@section('content')
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-lg">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-gray-800">Daftar Pendaftaran</h3>
        <p class="text-gray-600 text-sm">Kelola semua pendaftaran pelatihan</p>
    </div>
    
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 text-sm border-b border-gray-200">
                        <th class="pb-3 font-semibold">Peserta</th>
                        <th class="pb-3 font-semibold">Pelatihan</th>
                        <th class="pb-3 font-semibold">Tanggal Daftar</th>
                        <th class="pb-3 font-semibold">Status</th>
                        <th class="pb-3 font-semibold">Catatan</th>
                        <th class="pb-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($pendaftaran as $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-4">
                            <div>
                                <p class="font-semibold">{{ $item->user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $item->user->email }}</p>
                            </div>
                        </td>
                        <td class="py-4">
                            <div>
                                <p class="font-semibold">{{ $item->pelatihan->nama_pelatihan }}</p>
                                <p class="text-sm text-gray-500">{{ $item->pelatihan->instruktur }}</p>
                            </div>
                        </td>
                        <td class="py-4">{{ $item->created_at->format('d M Y H:i') }}</td>
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
                            <p class="text-sm text-gray-600">{{ $item->catatan ?? '-' }}</p>
                        </td>
                        <td class="py-4">
                            <button onclick="openModal({{ $item->id }}, '{{ $item->status }}', '{{ $item->catatan }}')" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                                <i class="fas fa-edit mr-1"></i>Update
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $pendaftaran->links() }}
        </div>
    </div>
</div>

<!-- Modal Update Status -->
<div id="updateModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl p-8 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Update Status Pendaftaran</h3>
        
        <form id="updateForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="modalStatus" name="status" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <div>
                    <label for="catatan" class="block text-gray-700 font-semibold mb-2">Catatan (Opsional)</label>
                    <textarea id="modalCatatan" name="catatan" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>

            <div class="mt-6 flex items-center space-x-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
                <button type="button" onclick="closeModal()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-400 transition">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openModal(id, status, catatan) {
    document.getElementById('updateForm').action = `/admin/pendaftaran/${id}`;
    document.getElementById('modalStatus').value = status;
    document.getElementById('modalCatatan').value = catatan || '';
    document.getElementById('updateModal').classList.remove('hidden');
    document.getElementById('updateModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('updateModal').classList.add('hidden');
    document.getElementById('updateModal').classList.remove('flex');
}

// Close modal when clicking outside
document.getElementById('updateModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>
@endpush
