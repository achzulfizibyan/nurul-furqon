<?php

namespace App\Models;

use App\Models\Donasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donatur extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'nama',
        'jumlah',
        'email',
        'no_hp',
        'catatan',
        'metode_pembayaran',
    ];

    // Casting agar jumlah selalu dianggap angka
    protected $casts = [
        'jumlah' => 'float',
    ];

    /**
     * Relasi ke program donasi
     */
    public function donasi()
    {
        return $this->belongsTo(Donasi::class);
    }
}