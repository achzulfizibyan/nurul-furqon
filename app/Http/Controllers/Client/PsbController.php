<?php

namespace App\Http\Controllers\Client;

use App\Models\Psb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PsbController extends Controller
{
    /**
     * Simpan data pendaftaran PSB
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'           => 'required|email|unique:psbs,email',
            'no_hp'           => 'required|string|max:15',
            'nama'            => 'required|string|max:255',
            'nisn'            => 'required|digits:10',
            'no_kk'           => 'required|digits:16',
            'nik'             => 'required|digits:16',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
            'provinsi'        => 'required|string',
            'kabupaten'       => 'required|string',
            'kecamatan'       => 'required|string',
            'kode_pos'        => 'required|digits:5',
            'detail_alamat'   => 'required|string|max:255',
            'jenjang'         => 'required|string',
            'program_tambahan'=> 'nullable|string',
            'motivasi'        => 'nullable|string',
        ]);

        // Simpan data ke database
        $psb = Psb::create($validated);

        // Redirect ke halaman success dengan ID pendaftar
        return redirect()
            ->route('client.psb.success', ['id' => $psb->id])
            ->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function success($id)
    {
        $psb = Psb::findOrFail($id);
        return view('client.menu.psb.success', compact('psb'));
    }

    /**
     * Export data pendaftaran ke PDF
     */
    public function exportPdf($id)
    {
        $psb = Psb::findOrFail($id);

        $pdf = PDF::loadView('client.menu.psb.pdf', compact('psb'));

        return $pdf->download('pendaftaran-' . $psb->nama . '.pdf');
    }
}