<?php
namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\AllKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori')->latest()->paginate(10);
        return view('admin.menu.berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategori = AllKategori::where('tipe', 'berita')->get();
        return view('admin.menu.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'is_published' => 'nullable|boolean',
            'gambar' => 'nullable|image|max:5120',
            'kategori_id' => 'required|exists:all_kategoris,id',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['id_user'] = auth()->id();

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id_berita)
    {
        $berita = Berita::findOrFail($id_berita);
        $kategori = AllKategori::where('tipe', 'berita')->get();
        return view('admin.menu.berita.edit', compact('berita','kategori'));
    }

    public function update(Request $request, $id_berita)
    {
        $berita = Berita::findOrFail($id_berita);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'is_published' => 'nullable|boolean',
            'gambar' => 'nullable|image|max:5120',
            'kategori_id' => 'required|exists:all_kategoris,id',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate');
    }

    public function destroy($id_berita)
    {
        $berita = Berita::findOrFail($id_berita);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
