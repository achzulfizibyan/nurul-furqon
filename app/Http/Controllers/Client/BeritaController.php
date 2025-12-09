<?php

namespace App\Http\Controllers\Client;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
     // LIST BERITA
    public function index()
    {
        // paginate 9 berita per halaman
        $berita = Berita::latest()->paginate(9);

        return view('client.menu.berita.index', compact('berita'));
    }

    // DETAIL BERITA
    public function show($slug)
    {
        $data = Berita::where('slug', $slug)->firstOrFail();

        // berita lain (untuk sidebar)
        $lainnya = Berita::latest()
        ->where('slug', '!=', $data->slug)
        ->take(5)
        ->get();

        return view('client.menu.berita.show', compact('data', 'lainnya'));
    }


}
