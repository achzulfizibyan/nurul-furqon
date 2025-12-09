<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul','deskripsi','gambar','target_dana','dana_terkumpul','batas_waktu'
    ];

    protected $casts = [
        'batas_waktu' => 'date',
    ];

    public function donaturs()
    {
        return $this->hasMany(Donatur::class);
    }

    public function getStatusAttribute()
    {
        return now()->startOfDay()->lt($this->batas_waktu) ? 'berjalan' : 'berakhir';
    }

    public function getDaysLeftAttribute()
    {
        return now()->startOfDay()->diffInDays($this->batas_waktu, false);
    }

    // Relasi ke transaksi
    public function transaksis()
    {
        return $this->hasMany(DonasiTransaksi::class);
    }



}
