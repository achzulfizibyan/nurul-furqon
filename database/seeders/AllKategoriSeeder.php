<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AllKategori;

class AllKategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Umum', 'tipe' => 'berita'],
            ['nama' => 'Pengumuman', 'tipe' => 'berita'],
            ['nama' => 'Kegiatan', 'tipe' => 'berita'],
            ['nama' => 'Artikel', 'tipe' => 'berita'],
            ['nama' => 'Opini', 'tipe' => 'berita'],
        ];

        foreach ($data as $item) {
            AllKategori::create($item);
        }
    }
}
