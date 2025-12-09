@extends('admin.layouts.app')

@section('title', 'Daftar Program Donasi')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Program Donasi</h1>
            <a href="{{ route('admin.donasi.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Program</a>
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
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Target Dana</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Terkumpul</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Jumlah Donatur</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Batas Waktu</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($donasis as $donasi)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loop->iteration + ($donasis->currentPage() - 1) * $donasis->perPage() }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $donasi->judul }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                Rp {{ number_format($donasi->target_dana, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                Rp {{ number_format($donasi->dana_terkumpul, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $donasi->donaturs()->count() }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ \Carbon\Carbon::parse($donasi->batas_waktu)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.donasi.show', $donasi->id) }}"
                                        class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Detail</a>
                                    <a href="{{ route('admin.donasi.edit', $donasi->id) }}"
                                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>
                                    <form action="{{ route('admin.donasi.destroy', $donasi->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus program ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada program donasi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $donasis->links() }}
        </div>
    </div>
@endsection
