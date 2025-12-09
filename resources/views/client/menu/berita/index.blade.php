@extends('client.layouts.client')
@section('title', 'Berita')
@section('content')

    <div class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold mb-6">Berita</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($berita as $item)
                <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
                    <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}"
                        class="w-full h-48 object-cover rounded-lg mb-4">

                    <h3 class="text-xl font-semibold mb-2">{{ $item->judul }}</h3>

                    {{-- tampilkan kategori --}}
                    <p class="text-sm text-gray-500 mb-2">
                        Kategori: {{ $item->kategori ? $item->kategori->nama : '-' }}
                    </p>

                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                    <span class="text-sm text-gray-400 block mb-4">
                        Dibuat: {{ $item->created_at->diffForHumans() }}
                    </span>
                    <a href="{{ route('client.menu.berita.show', $item->slug) }}"
                        class="text-blue-600 font-medium hover:underline">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $berita->links('vendor.pagination.tailwind') }}
        </div>
    </div>

@endsection
