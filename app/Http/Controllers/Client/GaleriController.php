<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Tampilkan daftar galeri ke client.
     */
    public function index()
    {
        // Ambil galeri terbaru, bisa ditambahkan filter jika perlu
        $galeris = Galeri::latest()->paginate(9); // tampilkan 9 per halaman

        return view('client.menu.galeri.index', compact('galeris'));
    }

    /**
     * Tampilkan detail galeri.
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('client.menu.galeri.show', compact('galeri'));
    }
}