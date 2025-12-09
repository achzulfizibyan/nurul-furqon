@extends('admin.layouts.app')

@section('title', 'Daftar Berita')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Berita</h1>
            <a href="{{ route('admin.berita.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Berita</a>
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
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Kategori</th>
                        {{-- kolom baru --}}
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Dibuat</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($beritas as $berita)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loop->iteration + ($beritas->currentPage() - 1) * $beritas->perPage() }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $berita->judul }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $berita->kategori ? $berita->kategori->nama : '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($berita->is_published)
                                    <span
                                        class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Published</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $berita->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}" method="POST"
                                        onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada berita</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
