@extends('admin.layouts.app')

@section('title', 'Manajemen File Download')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar File Download</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.download.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah File</a>
            <span class="text-gray-600">Total File: {{ $downloads->total() }}</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Judul</th>
                        <th class="border px-4 py-2 text-left">Kategori</th>
                        <th class="border px-4 py-2 text-left">File</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($downloads as $download)
                        <tr>
                            <td class="border px-4 py-2">{{ $download->judul }}</td>
                            <td class="border px-4 py-2">
                                {{ $download->kategori ? $download->kategori->nama : '-' }}
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ asset('storage/' . $download->file) }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat PDF</a>
                            </td>
                            <td class="border px-4 py-2 text-center space-x-2">
                                <a href="{{ route('admin.download.edit', $download->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('admin.download.destroy', $download->id) }}" method="POST"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus file ini?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                Belum ada file download.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $downloads->links() }}
        </div>
    </div>
@endsection
