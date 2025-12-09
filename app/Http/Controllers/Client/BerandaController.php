<?php

namespace App\Http\Controllers\Client;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->take(3)->get();
        $berita = Berita::latest()->take(3)->get();
        return view('client.beranda', compact('galeri', 'berita'));
    }
}
