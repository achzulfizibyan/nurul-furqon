<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllKategori extends Model
{
    protected $table = 'all_kategoris'; // sesuai migration
    protected $fillable = ['nama', 'tipe'];

    // Relasi ke Berita
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }

    // Relasi ke Galeri
    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'kategori_id');
    }

    // Relasi ke Download
    public function downloads()
    {
        return $this->hasMany(Download::class, 'kategori_id');
    }
}