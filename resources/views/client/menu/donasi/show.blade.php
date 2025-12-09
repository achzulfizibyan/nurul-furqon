@extends('client.layouts.client')

@section('title', $donasi->judul)

@section('content')
    <div class="container mx-auto py-16 px-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            {{-- Banner --}}
            @if ($donasi->gambar)
                <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="{{ $donasi->judul }}"
                    class="w-full h-64 object-cover">
            @endif

            <div class="p-6">
                {{-- Judul --}}
                <h1 class="text-3xl font-bold mb-4">{{ $donasi->judul }}</h1>

                {{-- Deskripsi --}}
                <p class="text-gray-700 mb-6">{{ $donasi->deskripsi }}</p>

                {{-- Progress Donasi --}}
                @php
                    $target = max(1, (int) $donasi->target_dana);
                    $progress = min(100, ($donasi->dana_terkumpul / $target) * 100);
                    $daysLeft = now()->startOfDay()->diffInDays($donasi->batas_waktu, false);
                @endphp
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Terkumpul: Rp {{ number_format($donasi->dana_terkumpul, 0, ',', '.') }}</span>
                        <span>Target: Rp {{ number_format($donasi->target_dana, 0, ',', '.') }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-green-500 h-4 rounded-full" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                {{-- Sisa Waktu --}}
                <div class="text-sm text-gray-600 mb-6">
                    @if ($daysLeft > 0)
                        Sisa waktu: <strong>{{ $daysLeft }} hari lagi</strong>
                    @else
                        <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded">Program donasi sudah
                            selesai</span>
                    @endif
                </div>

                {{-- Tombol Donasi dan Share --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <a href="{{ route('client.donasi.donateForm', $donasi->id) }}"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
                        Donasi Sekarang
                    </a>

                    <a href="https://wa.me/?text={{ urlencode(route('client.donasi.show', $donasi->id)) }}" target="_blank"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">WhatsApp</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('client.donasi.show', $donasi->id)) }}"
                        target="_blank" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('client.donasi.show', $donasi->id)) }}&text={{ urlencode($donasi->judul) }}"
                        target="_blank" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600">Twitter</a>
                </div>

                {{-- Tombol kembali --}}
                <a href="{{ route('client.donasi.index') }}"
                    class="inline-block bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600">
                    Kembali ke Daftar
                </a>
            </div>
        </div>

        {{-- Daftar Donatur --}}
        <div class="bg-white rounded-lg shadow-md mt-10 p-6">
            <h2 class="text-xl font-bold mb-4">Donatur</h2>
            @if (isset($donasi->donaturs) && $donasi->donaturs->count())
                <ul class="space-y-2">
                    @foreach ($donasi->donaturs as $donatur)
                        <li class="flex justify-between border-b pb-2">
                            <span class="font-medium">{{ $donatur->nama }}</span>
                            <span class="text-gray-600">Rp {{ number_format($donatur->jumlah, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Belum ada donatur.</p>
            @endif
        </div>
    </div>
@endsection
