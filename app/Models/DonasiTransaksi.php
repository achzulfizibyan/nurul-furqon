<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiTransaksi extends Model
{
    protected $fillable = [
        'donasi_id',
        'user_id',
        'jumlah',
        'metode',
    ];

    // Relasi ke kampanye donasi
    public function donasi()
    {
        return $this->belongsTo(Donasi::class);
    }
}
