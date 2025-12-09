<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 50 berita dummy
        Berita::factory()->count(50)->create();
    }
}
