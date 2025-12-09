<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Psb;

class PsbSeeder extends Seeder
{
    public function run(): void
    {
        Psb::create([
            'email' => 'santri.demo1@example.com',
            'no_hp' => '081234567890',
            'nama' => 'Ahmad Fauzi',
            'nisn' => '1234567890',
            'no_kk' => '1234567890123456',
            'nik' => '3210987654321098',
            'tempat_lahir' => 'Paiton',
            'tanggal_lahir' => '2008-05-12',
            'jenis_kelamin' => 'Laki-laki',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Probolinggo',
            'kecamatan' => 'Paiton',
            'kode_pos' => '67291',
            'detail_alamat' => 'Jl. Raya Paiton No. 45',
            'jenjang' => 'SMP',
            'program_tambahan' => 'Tahfidz Qur\'an',
            'motivasi' => 'Ingin memperdalam ilmu agama.',
        ]);

        Psb::create([
            'email' => 'santri.demo2@example.com',
            'no_hp' => '082345678901',
            'nama' => 'Siti Aisyah',
            'nisn' => '9876543210',
            'no_kk' => '6543210987654321',
            'nik' => '2109876543210987',
            'tempat_lahir' => 'Probolinggo',
            'tanggal_lahir' => '2009-08-20',
            'jenis_kelamin' => 'Perempuan',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Probolinggo',
            'kecamatan' => 'Kraksaan',
            'kode_pos' => '67282',
            'detail_alamat' => 'Jl. Mawar No. 12',
            'jenjang' => 'SMA',
            'program_tambahan' => 'Kitab Kuning',
            'motivasi' => 'Ingin memperdalam fiqh dan tafsir.',
        ]);

        Psb::create([
            'email' => 'santri.demo3@example.com',
            'no_hp' => '083456789012',
            'nama' => 'Muhammad Rizki',
            'nisn' => '1122334455',
            'no_kk' => '9988776655443322',
            'nik' => '6677889900112233',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2007-03-15',
            'jenis_kelamin' => 'Laki-laki',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Surabaya',
            'kecamatan' => 'Wonokromo',
            'kode_pos' => '60243',
            'detail_alamat' => 'Jl. Diponegoro No. 7',
            'jenjang' => 'SMP',
            'program_tambahan' => 'Bahasa Arab Intensif',
            'motivasi' => 'Ingin menjadi ustadz dan pengajar.',
        ]);
    }
}
