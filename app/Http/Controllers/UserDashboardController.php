<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)
            ->with('pelatihan')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.dashboard', compact('user', 'pendaftaran'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile berhasil diupdate!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function kelasSaya()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)
            ->where('status', 'diterima')
            ->with('pelatihan')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.kelas-saya', compact('pendaftaran'));
    }

    public function daftarPelatihan($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        
        if (!$pelatihan->tersedia()) {
            return back()->with('error', 'Pelatihan tidak tersedia atau sudah penuh.');
        }

        $user = Auth::user();

        // Cek apakah sudah terdaftar
        $sudahDaftar = Pendaftaran::where('user_id', $user->id)
            ->where('pelatihan_id', $id)
            ->exists();

        if ($sudahDaftar) {
            return back()->with('error', 'Anda sudah terdaftar di pelatihan ini.');
        }

        Pendaftaran::create([
            'user_id' => $user->id,
            'pelatihan_id' => $id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pendaftaran berhasil! Menunggu konfirmasi admin.');
    }
}
