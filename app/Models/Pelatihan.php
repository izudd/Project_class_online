<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';

    protected $fillable = [
        'nama_pelatihan',
        'deskripsi',
        'instruktur',
        'durasi_jam',
        'harga',
        'kuota',
        'peserta_terdaftar',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu',
        'status',
        'gambar',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'harga' => 'decimal:2',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function tersedia()
    {
        return $this->peserta_terdaftar < $this->kuota && $this->status === 'aktif';
    }
}
