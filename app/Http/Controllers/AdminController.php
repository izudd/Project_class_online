<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        $totalPelatihan = Pelatihan::count();
        $pelatihanAktif = Pelatihan::where('status', 'aktif')->count();
        
        // Jadwal hari ini
        $jadwalHariIni = Pelatihan::whereDate('tanggal_mulai', '<=', Carbon::today())
            ->whereDate('tanggal_selesai', '>=', Carbon::today())
            ->where('status', 'aktif')
            ->get();

        $totalPendaftar = Pendaftaran::count();
        $pendaftaranPending = Pendaftaran::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalPelatihan',
            'pelatihanAktif',
            'jadwalHariIni',
            'totalPendaftar',
            'pendaftaranPending'
        ));
    }

    public function pelatihan()
    {
        $pelatihan = Pelatihan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pelatihan.index', compact('pelatihan'));
    }

    public function pelatihanCreate()
    {
        return view('admin.pelatihan.create');
    }

    public function pelatihanStore(Request $request)
    {
        $validated = $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'instruktur' => 'required|string|max:255',
            'durasi_jam' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'kuota' => 'required|integer|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu' => 'required|string',
            'status' => 'required|in:aktif,penuh,selesai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('pelatihan', 'public');
        }

        Pelatihan::create($validated);

        return redirect()->route('admin.pelatihan')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    public function pelatihanEdit($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('admin.pelatihan.edit', compact('pelatihan'));
    }

    public function pelatihanUpdate(Request $request, $id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $validated = $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'instruktur' => 'required|string|max:255',
            'durasi_jam' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'kuota' => 'required|integer|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu' => 'required|string',
            'status' => 'required|in:aktif,penuh,selesai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($pelatihan->gambar) {
                Storage::disk('public')->delete($pelatihan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('pelatihan', 'public');
        }

        $pelatihan->update($validated);

        return redirect()->route('admin.pelatihan')->with('success', 'Pelatihan berhasil diupdate!');
    }

    public function pelatihanDestroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        
        if ($pelatihan->gambar) {
            Storage::disk('public')->delete($pelatihan->gambar);
        }

        $pelatihan->delete();

        return redirect()->route('admin.pelatihan')->with('success', 'Pelatihan berhasil dihapus!');
    }

    public function pendaftaran()
    {
        $pendaftaran = Pendaftaran::with(['user', 'pelatihan'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function pendaftaranUpdate(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $oldStatus = $pendaftaran->status;
        $pendaftaran->update($validated);

        // Update peserta terdaftar
        if ($validated['status'] === 'diterima' && $oldStatus !== 'diterima') {
            $pendaftaran->pelatihan->increment('peserta_terdaftar');
        } elseif ($oldStatus === 'diterima' && $validated['status'] !== 'diterima') {
            $pendaftaran->pelatihan->decrement('peserta_terdaftar');
        }

        return back()->with('success', 'Status pendaftaran berhasil diupdate!');
    }
}
