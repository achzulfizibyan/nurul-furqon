<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Psb;
use App\Models\Donasi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalBerita = Berita::count();
        $totalDonasi = Donasi::sum('dana_terkumpul'); // total semua program
        $totalPsb    = Psb::count();

        // Data tambahan untuk grafik / aktivitas terbaru
        $latestBerita = Berita::latest()->take(5)->get();

        // Mengambil data pendaftar PSB per bulan
        $psbPerBulan = Psb::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Format untuk Chart.js
        $bulan = $psbPerBulan->pluck('bulan')->map(function($b){
            return date("F", mktime(0,0,0,$b,1)); // ubah angka bulan jadi nama bulan
        });
        $jumlahPendaftar = $psbPerBulan->pluck('jumlah');

        // Kirim ke view
        return view('admin.layouts.dashboard', compact(
            'totalBerita',
            'totalDonasi',
            'totalPsb',
            'latestBerita',
            'bulan',
            'jumlahPendaftar'
        ));
    }
}
