@extends('client.layouts.client')

@section('title', 'Download')

@section('content')
    <div class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold mb-6">Download</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">No</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Judul</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Kategori</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">File</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($downloads as $download)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">
                                {{ $loop->iteration + ($downloads->currentPage() - 1) * $downloads->perPage() }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $download->judul }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">
                                {{ $download->kategori ? $download->kategori->nama : '-' }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ asset('storage/' . $download->file) }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    Unduh
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada file tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-6">
                {{ $downloads->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection
