<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class DonasiController extends Controller
{
    /**
     * Tampilkan daftar program donasi
     */
    public function index()
    {
        $donasis = Donasi::withCount('donaturs')->latest()->paginate(10);
        return view('admin.menu.donasi.index', compact('donasis'));
    }

    /**
     * Tampilkan detail program donasi + daftar donatur
     */
    public function show(Donasi $donasi)
    {
        $donasi->load('donaturs');
        return view('admin.menu.donasi.show', compact('donasi'));
    }

    /**
     * Form tambah program donasi
     */
    public function create()
    {
        return view('admin.menu.donasi.create');
    }

    /**
     * Simpan program donasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'target_dana' => 'required|numeric|min:0',
            'batas_waktu' => 'required|date',
        ]);

        $path = $request->hasFile('gambar')
            ? $request->file('gambar')->store('donasi', 'public')
            : null;

        Donasi::create([
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'gambar'        => $path,
            'target_dana'   => $request->target_dana,
            'dana_terkumpul'=> 0,
            'batas_waktu'   => $request->batas_waktu,
            'status'        => 'open',
        ]);

        return redirect()->route('admin.donasi.index')
                         ->with('success', 'Program donasi berhasil ditambahkan');
    }

    /**
     * Form edit program donasi
     */
    public function edit(Donasi $donasi)
    {
        return view('admin.menu.donasi.edit', compact('donasi'));
    }

    /**
     * Update program donasi
     */
    public function update(Request $request, Donasi $donasi)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'target_dana' => 'required|numeric|min:0',
            'batas_waktu' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            if ($donasi->gambar) {
                Storage::disk('public')->delete($donasi->gambar);
            }
            $donasi->gambar = $request->file('gambar')->store('donasi', 'public');
        }

        $donasi->update($request->only('judul', 'deskripsi', 'target_dana', 'batas_waktu'));

        return redirect()->route('admin.donasi.index')
                         ->with('success', 'Program donasi berhasil diupdate');
    }

    /**
     * Hapus program donasi
     */
    public function destroy(Donasi $donasi)
    {
        if ($donasi->gambar) {
            Storage::disk('public')->delete($donasi->gambar);
        }
        $donasi->delete();

        return redirect()->route('admin.donasi.index')
                         ->with('success', 'Program donasi berhasil dihapus');
    }

    /**
     * Tutup program donasi
     */
    public function close(Donasi $donasi)
    {
        $donasi->update(['status' => 'closed']);
        return redirect()->route('admin.donasi.show', $donasi->id)
                         ->with('success', 'Program donasi berhasil ditutup.');
    }

    /**
     * Perpanjang program donasi (misalnya tambah 30 hari)
     */
    public function extend(Donasi $donasi)
    {
        $donasi->update([
            'batas_waktu' => now()->addDays(30),
            'status'      => 'open',
        ]);
        return redirect()->route('admin.donasi.show', $donasi->id)
                         ->with('success', 'Program donasi diperpanjang 30 hari.');
    }

    /**
     * Export laporan donasi ke CSV
     */
    public function export(Donasi $donasi)
    {
        $filename = 'laporan_donasi_' . $donasi->id . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $callback = function () use ($donasi) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Nama Donatur', 'Nominal', 'Metode Pembayaran', 'Waktu Donasi']);

            foreach ($donasi->donaturs as $donatur) {
                fputcsv($handle, [
                    $donatur->nama,
                    number_format($donatur->jumlah, 0, ',', '.'), // format nominal
                    $donatur->metode_pembayaran ?? '-',
                    $donatur->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Broadcast ucapan terima kasih via WhatsApp
     */
    public function broadcast(Donasi $donasi)
    {
        foreach ($donasi->donaturs as $donatur) {
            if ($donatur->no_hp) {
                $message = "Terima kasih atas donasi Anda sebesar Rp " .
                    number_format($donatur->jumlah, 0, ',', '.') .
                    " untuk program {$donasi->judul}. Semoga berkah 🙏";

                // Contoh integrasi Fonnte / Wablas
                Http::withHeaders([
                    'Authorization' => env('WA_API_KEY'),
                ])->post('https://api.fonnte.com/send', [
                    'target' => $donatur->no_hp,
                    'message' => $message,
                ]);
            }
        }

        return redirect()->route('admin.donasi.show', $donasi->id)
                         ->with('success', 'Broadcast ucapan terima kasih berhasil dikirim.');
    }
}
