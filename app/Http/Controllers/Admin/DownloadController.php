<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\AllKategori;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::with('kategori')->latest()->paginate(10);
        return view('admin.menu.download.index', compact('downloads'));
    }

    public function create()
    {
        // Ambil kategori khusus tipe "download"
        $kategori = AllKategori::where('tipe', 'download')->get();
        return view('admin.menu.download.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120', // max 5MB
            'kategori_id' => 'required|exists:all_kategoris,id',
        ]);

        $path = $request->file('file')->store('downloads', 'public');

        Download::create([
            'judul' => $request->judul,
            'file' => $path,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.download.index')->with('success', 'File berhasil ditambahkan');
    }

    public function edit(Download $download)
    {
        $kategori = AllKategori::where('tipe', 'download')->get();
        return view('admin.menu.download.edit', compact('download','kategori'));
    }

    public function update(Request $request, Download $download)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:5120',
            'kategori_id' => 'required|exists:all_kategoris,id',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('downloads', 'public');
            $download->file = $path;
        }

        $download->judul = $request->judul;
        $download->kategori_id = $request->kategori_id;
        $download->save();

        return redirect()->route('admin.download.index')->with('success', 'File berhasil diupdate');
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return redirect()->route('admin.download.index')->with('success', 'File berhasil dihapus');
    }
}
