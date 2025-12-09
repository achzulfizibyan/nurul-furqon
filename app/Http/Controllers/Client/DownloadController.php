<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        // Ambil daftar file download terbaru dengan kategori
        $downloads = Download::with('kategori')->latest()->paginate(10);

        return view('client.menu.download.index', compact('downloads'));
    }

    public function show(Download $download)
    {
        // Halaman detail download (opsional)
        return view('client.menu.download.show', compact('download'));
    }
}
