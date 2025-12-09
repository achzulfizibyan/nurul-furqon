<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Tampilkan semua galeri.
     */
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('admin.menu.galeri.index', compact('galeris'));
    }

    /**
     * Form tambah galeri.
     */
    public function create()
    {
        return view('admin.menu.galeri.create');
    }

    /**
     * Simpan galeri baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan file gambar ke storage/public/galeris
        $path = $request->file('gambar')->store('galeris', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    /**
     * Form edit galeri.
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.menu.galeri.edit', compact('galeri'));
    }

    /**
     * Update galeri.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('galeris', 'public');
            $galeri->gambar = $path;
        }

        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
    }

    /**
     * Hapus galeri.
     */
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
