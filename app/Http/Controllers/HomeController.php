<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::where('status', 'aktif')
            ->orderBy('tanggal_mulai', 'asc')
            ->take(6)
            ->get();
        
        return view('frontend.home', compact('pelatihan'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function pelatihan()
    {
        $pelatihan = Pelatihan::where('status', 'aktif')
            ->orderBy('tanggal_mulai', 'asc')
            ->paginate(9);
        
        return view('frontend.pelatihan', compact('pelatihan'));
    }

    public function pelatihanDetail($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('frontend.pelatihan-detail', compact('pelatihan'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Di sini bisa ditambahkan logic untuk kirim email atau simpan ke database
        
        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
