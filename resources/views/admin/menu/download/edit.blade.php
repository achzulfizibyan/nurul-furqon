@extends('admin.layouts.app')

@section('title', 'Edit File Download')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit File Download</h1>

        <form action="{{ route('admin.download.update', $download->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ $download->judul }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="block font-semibold mb-2">Kategori</label>
                <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ $download->kategori_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-2">File PDF (kosongkan jika tidak diganti)</label>
                <input type="file" name="file" accept="application/pdf" class="w-full border rounded px-3 py-2">
                <p class="text-sm text-gray-500 mt-1">
                    File saat ini:
                    <a href="{{ asset('storage/' . $download->file) }}" target="_blank"
                        class="text-blue-600 hover:underline">Lihat PDF</a>
                </p>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
