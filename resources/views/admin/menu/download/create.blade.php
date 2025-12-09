@extends('admin.layouts.app')

@section('title', 'Tambah File Download')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Tambah File Download</h1>

        <form action="{{ route('admin.download.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold mb-2">Judul</label>
                <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-2">Kategori</label>
                <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Kategori diambil dari AllKategori dengan tipe
                    <strong>download</strong>.</p>
            </div>

            <div>
                <label class="block font-semibold mb-2">File PDF</label>
                <input type="file" name="file" accept="application/pdf" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
