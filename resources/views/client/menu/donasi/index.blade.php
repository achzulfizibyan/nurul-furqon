@extends('client.layouts.client')

@section('title', 'Program Donasi')

@section('content')
    <div class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Program Donasi</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($programs as $program)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    {{-- Banner --}}
                    @if ($program->gambar)
                        <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}"
                            class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6 flex-1 flex flex-col">
                        {{-- Judul --}}
                        <h3 class="text-xl font-semibold mb-2">{{ $program->judul }}</h3>

                        {{-- Deskripsi singkat --}}
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $program->deskripsi }}</p>

                        {{-- Progress Donasi --}}
                        @php
                            $target = max(1, (int) $program->target_dana);
                            $progress = min(100, ($program->dana_terkumpul / $target) * 100);
                            $daysLeft = now()->startOfDay()->diffInDays($program->batas_waktu, false);
                        @endphp
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-500 mb-1">
                                <span>Terkumpul: Rp {{ number_format($program->dana_terkumpul, 0, ',', '.') }}</span>
                                <span>Target: Rp {{ number_format($program->target_dana, 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-green-500 h-3 rounded-full" style="width: {{ $progress }}%"></div>
                            </div>
                        </div>

                        {{-- Sisa Waktu --}}
                        <div class="text-sm text-gray-500 mb-6">
                            @if ($daysLeft > 0)
                                Sisa waktu: <strong>{{ $daysLeft }} hari lagi</strong>
                            @else
                                <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded">Berakhir</span>
                            @endif
                        </div>

                        {{-- Tombol Detail --}}
                        <a href="{{ route('client.donasi.show', $program->id) }}"
                            class="mt-auto inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-center">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    Belum ada program donasi tersedia
                </div>
            @endforelse
        </div>
    </div>
@endsection
