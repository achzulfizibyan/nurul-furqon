<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Psb;
use Illuminate\Http\Request;

class PsbController extends Controller
{
    /**
     * Tampilkan daftar pendaftar PSB
     */
    public function index(Request $request)
    {
        $query = Psb::query();

        // Jika ada keyword pencarian
        if ($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            $query->where(function($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%")
                ->orWhere('nisn', 'like', "%{$keyword}%")
                ->orWhere('no_hp', 'like', "%{$keyword}%");
            });
        }

        $psbs = $query->latest()->paginate(20)->withQueryString();

        return view('admin.menu.psb.index', compact('psbs'));
    }

    /**
     * Tampilkan detail pendaftar berdasarkan ID
     */
    public function show($id)
    {
        $psb = Psb::findOrFail($id);

        return view('admin.menu.psb.show', compact('psb'));
    }

    public function edit($id)
    {
        $psb = Psb::findOrFail($id);
        return view('admin.menu.psb.edit', compact('psb'));
    }

    public function update(Request $request, $id)
    {
        $psb = Psb::findOrFail($id);

        $psb->update($request->all());

        return redirect()->route('admin.psb.show', $psb->id)
                        ->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $psb = Psb::findOrFail($id);
        $psb->delete();

        return redirect()->route('admin.psb.index')
        ->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function exportPdf($id)
    {
        $psb = Psb::findOrFail($id);

        // Gunakan dompdf atau laravel-snappy
        $pdf = \PDF::loadView('admin.psb.pdf', compact('psb'));
        return $pdf->download('psb_'.$psb->id.'.pdf');
    }
}