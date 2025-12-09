@extends('admin.layouts.app')

@section('title', 'Daftar Galeri')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Galeri</h1>
            <a href="{{ route('admin.galeri.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Galeri</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nomor</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Gambar</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Dibuat</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($galeris as $galeri)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loop->iteration + ($galeris->currentPage() - 1) * $galeris->perPage() }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $galeri->judul }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                    class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $galeri->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                    class="text-blue-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus galeri ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada galeri</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $galeris->links() }}
        </div>
    </div>
@endsection
