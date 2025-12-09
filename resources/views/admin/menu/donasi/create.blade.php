@extends('admin.layouts.app')

@section('title', 'Tambah Program Donasi')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Tambah Program Donasi</h1>

        <form action="{{ route('admin.donasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" class="mt-1 block w-full">
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Target Dana</label>
                <input type="number" name="target_dana" value="{{ old('target_dana') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('target_dana')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Batas Waktu</label>
                <input type="date" name="batas_waktu" value="{{ old('batas_waktu') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('batas_waktu')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('admin.donasi.index') }}"
                    class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
@endsection
