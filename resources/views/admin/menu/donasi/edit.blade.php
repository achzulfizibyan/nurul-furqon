@extends('admin.layouts.app')

@section('title', 'Edit Program Donasi')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Program Donasi</h1>

        <form action="{{ route('admin.donasi.update', $donasi->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $donasi->judul) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $donasi->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                @if ($donasi->gambar)
                    <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="Gambar Donasi" class="w-48 mb-2">
                @endif
                <input type="file" name="gambar" class="mt-1 block w-full">
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Target Dana</label>
                <input type="number" name="target_dana" value="{{ old('target_dana', $donasi->target_dana) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('target_dana')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Batas Waktu</label>
                <input type="date" name="batas_waktu" value="{{ old('batas_waktu', $donasi->batas_waktu) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('batas_waktu')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('admin.donasi.index') }}"
                    class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
@endsection
