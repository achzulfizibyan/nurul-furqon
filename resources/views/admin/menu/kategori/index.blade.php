@extends('admin.layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Manajemen Kategori</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Section Berita --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-2">Kategori Berita
                <span class="text-sm text-gray-600">(Total: {{ $totalBerita }})</span>
            </h2>
            <div class="flex space-x-4">
                {{-- Form tambah di kiri --}}
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="flex flex-col space-y-2 w-1/3">
                    @csrf
                    <input type="hidden" name="tipe" value="berita">
                    <input type="text" name="nama" placeholder="Nama kategori berita" class="border px-2 py-1 rounded"
                        required>
                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Tambah</button>
                </form>
                {{-- Kotak scroll daftar kategori di kanan --}}
                <div class="border rounded p-3 h-40 overflow-y-auto bg-gray-50 flex-1">
                    <ul class="list-disc list-inside space-y-1">
                        @forelse($beritaKategori as $kat)
                            <li>{{ $kat->nama }}</li>
                        @empty
                            <li class="text-gray-500">Belum ada kategori berita.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        {{-- Section Galeri --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-2">Kategori Galeri
                <span class="text-sm text-gray-600">(Total: {{ $totalGaleri }})</span>
            </h2>
            <div class="flex space-x-4">
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="flex flex-col space-y-2 w-1/3">
                    @csrf
                    <input type="hidden" name="tipe" value="galeri">
                    <input type="text" name="nama" placeholder="Nama kategori galeri" class="border px-2 py-1 rounded"
                        required>
                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Tambah</button>
                </form>
                <div class="border rounded p-3 h-40 overflow-y-auto bg-gray-50 flex-1">
                    <ul class="list-disc list-inside space-y-1">
                        @forelse($galeriKategori as $kat)
                            <li>{{ $kat->nama }}</li>
                        @empty
                            <li class="text-gray-500">Belum ada kategori galeri.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        {{-- Section Download --}}
        <div>
            <h2 class="text-xl font-semibold mb-2">Kategori Download
                <span class="text-sm text-gray-600">(Total: {{ $totalDownload }})</span>
            </h2>
            <div class="flex space-x-4">
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="flex flex-col space-y-2 w-1/3">
                    @csrf
                    <input type="hidden" name="tipe" value="download">
                    <input type="text" name="nama" placeholder="Nama kategori download"
                        class="border px-2 py-1 rounded" required>
                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Tambah</button>
                </form>
                <div class="border rounded p-3 h-40 overflow-y-auto bg-gray-50 flex-1">
                    <ul class="list-disc list-inside space-y-1">
                        @forelse($downloadKategori as $kat)
                            <li>{{ $kat->nama }}</li>
                        @empty
                            <li class="text-gray-500">Belum ada kategori download.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
