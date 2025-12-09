@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Berita</h1>

        <form action="{{ route('admin.berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-medium">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                    class="w-full border px-3 py-2 rounded" required>
            </div>

            {{-- Dropdown kategori --}}
            <div class="mb-4">
                <label class="block mb-2 font-medium">Kategori</label>
                <select name="kategori_id" class="w-full border px-3 py-2 rounded" required>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}"
                            {{ old('kategori_id', $berita->kategori_id) == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Isi</label>
                <textarea id="editor" name="isi" class="w-full border px-3 py-2 rounded h-32" required>{{ old('isi', $berita->isi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_published" value="1" class="mr-2"
                        {{ $berita->is_published ? 'checked' : '' }}> Publikasikan
                </label>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Gambar</label>
                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita"
                        class="mb-2 w-48 h-32 object-cover rounded">
                @endif
                <input type="file" name="gambar" class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.berita.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
