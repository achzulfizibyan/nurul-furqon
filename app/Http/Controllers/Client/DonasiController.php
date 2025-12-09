<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $programs = Donasi::latest()->paginate(9);
        return view('client.menu.donasi.index', compact('programs'));
    }

    public function show(Donasi $donasi)
    {
        $donasi->load('donaturs');
        return view('client.menu.donasi.show', compact('donasi'));
    }

    public function donateForm(Donasi $donasi)
    {
        return view('client.menu.donasi.donate', compact('donasi'));
    }

    public function storeDonation(Request $request, Donasi $donasi)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1000',
            'email'  => 'nullable|email',
            'no_hp'  => 'nullable|string|max:20',
            'catatan'=> 'nullable|string',
        ]);

        $donatur = $donasi->donaturs()->create([
            'nama'   => $request->nama,
            'jumlah' => $request->jumlah,
            'email'  => $request->email,
            'no_hp'  => $request->no_hp,
            'catatan'=> $request->catatan,
            'metode_pembayaran' => 'Manual Transfer',
        ]);

        $donasi->increment('dana_terkumpul', $request->jumlah);

        // Redirect ke PaymentController (di sini QRIS akan dibuat)
        return redirect()->route('client.donasi.payment', [$donasi->id, $donatur->id]);
    }
}