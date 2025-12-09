<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psb extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'no_hp',
        'nama',
        'nisn',
        'no_kk',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kode_pos',
        'detail_alamat',
        'jenjang',
        'program_tambahan',
        'motivasi',
    ];

    // Hash password otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($psb) {
        });
    }
}