@extends('admin.layouts.app')

@section('title', 'Detail Program Donasi')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Detail Program Donasi</h1>

        {{-- Informasi Program --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4">Informasi Program</h2>
            <div class="space-y-3 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Judul</span>
                    <span class="font-medium">{{ $donasi->judul }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Target Dana</span>
                    <span class="font-medium">Rp {{ number_format($donasi->target_dana, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Dana Terkumpul</span>
                    <span class="font-medium">Rp {{ number_format($donasi->dana_terkumpul, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Jumlah Donatur</span>
                    <span class="font-medium">{{ $donasi->donaturs()->count() }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Batas Waktu</span>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($donasi->batas_waktu)->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        {{-- Daftar Donatur --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4">Daftar Donatur</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nama Donatur</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nominal</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Metode Pembayaran</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Waktu Donasi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($donasi->donaturs as $donatur)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $donatur->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    Rp {{ number_format($donatur->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $donatur->metode_pembayaran }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($donatur->created_at)->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada donatur</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Log Transaksi --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4">Log Transaksi</h2>
            <ul class="space-y-2 text-sm text-gray-700">
                @forelse($donasi->donaturs as $donatur)
                    <li>
                        Donasi baru masuk dari <strong>{{ $donatur->nama }}</strong>
                        sebesar Rp {{ number_format($donatur->jumlah, 0, ',', '.') }}
                        via {{ $donatur->metode_pembayaran }}
                        pada {{ \Carbon\Carbon::parse($donatur->created_at)->format('d M Y H:i') }}
                    </li>
                @empty
                    <li class="text-gray-500">Belum ada log transaksi</li>
                @endforelse
            </ul>
        </div>

        {{-- Aksi Admin --}}
        <div class="flex space-x-3">
            <a href="{{ route('admin.donasi.edit', $donasi->id) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit Program</a>

            {{-- Tutup Program --}}
            <form action="{{ route('admin.donasi.close', $donasi->id) }}" method="POST"
                onsubmit="return confirm('Tutup program ini?')">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Tutup Program
                </button>
            </form>

            {{-- Perpanjang Program --}}
            <a href="{{ route('admin.donasi.extend', $donasi->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Perpanjang Program</a>

            {{-- Export Laporan --}}
            <a href="{{ route('admin.donasi.export', $donasi->id) }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Export Laporan</a>

            {{-- Broadcast WA --}}
            <form action="{{ route('admin.donasi.broadcast', $donasi->id) }}" method="POST"
                onsubmit="return confirm('Kirim ucapan terima kasih ke semua donatur via WhatsApp?')">
                @csrf
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Broadcast WA
                </button>
            </form>
        </div>
    </div>
@endsection
