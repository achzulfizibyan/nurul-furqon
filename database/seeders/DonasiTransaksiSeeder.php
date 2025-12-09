<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donasi;
use App\Models\DonasiTransaksi;

class DonasiTransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada kampanye donasi dulu
        $donasi = Donasi::first() ?? Donasi::create([
            'judul' => 'Bantu Pembangunan Masjid',
            'deskripsi' => 'Kampanye untuk pembangunan masjid Nurul Furqon.',
            'gambar' => null,
            'target_dana' => 100000000,
            'dana_terkumpul' => 0,
            'batas_waktu' => now()->addMonths(3),
        ]);

        // Tambahkan beberapa transaksi dummy
        $transaksis = [
            ['jumlah' => 50000, 'metode' => 'Transfer Bank'],
            ['jumlah' => 100000, 'metode' => 'Cash'],
            ['jumlah' => 250000, 'metode' => 'E-Wallet'],
        ];

        foreach ($transaksis as $trx) {
            DonasiTransaksi::create([
                'donasi_id' => $donasi->id,
                'user_id'   => null, // bisa diisi kalau ada sistem user
                'jumlah'    => $trx['jumlah'],
                'metode'    => $trx['metode'],
            ]);
        }

        // Update dana_terkumpul di kampanye
        $donasi->update([
            'dana_terkumpul' => DonasiTransaksi::where('donasi_id', $donasi->id)->sum('jumlah')
        ]);
    }
}
