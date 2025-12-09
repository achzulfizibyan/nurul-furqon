<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllKategori;
use Illuminate\Http\Request;

class AllKategoriController extends Controller
{
    public function index()
    {
        $beritaKategori   = AllKategori::where('tipe', 'berita')->get();
        $galeriKategori   = AllKategori::where('tipe', 'galeri')->get();
        $downloadKategori = AllKategori::where('tipe', 'download')->get();

        $totalBerita   = $beritaKategori->count();
        $totalGaleri   = $galeriKategori->count();
        $totalDownload = $downloadKategori->count();

        return view('admin.menu.kategori.index', compact(
            'beritaKategori','galeriKategori','downloadKategori',
            'totalBerita','totalGaleri','totalDownload'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:berita,galeri,download',
        ]);

        AllKategori::create($request->only('nama','tipe'));

        return back()->with('success','Kategori berhasil ditambahkan');
    }
}