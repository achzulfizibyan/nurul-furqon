<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        $judul = $this->faker->sentence(6);
        return [
            'judul' => $judul,
            'slug' => Str::slug($judul) . '-' . Str::random(5),
            'isi' => '<p>' . $this->faker->paragraph(5) . '</p>',
            'gambar' => null, // bisa diisi path dummy kalau perlu
            'is_published' => $this->faker->boolean(70), // 70% published
            'id_user' => 1, // sesuaikan dengan user admin
            'kategori_id' => $this->faker->numberBetween(1, 5), // sesuaikan dengan kategori yang ada
        ];
    }
}
