@extends('client.layouts.client')

@section('title', 'Galeri')

@section('content')
    <div class="container mx-auto px-4 py-8 mt-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Galeri Kegiatan</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($galeris->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($galeris as $galeri)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <a href="{{ route('client.menu.galeri.show', $galeri->id) }}">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2">
                                <a href="{{ route('client.menu.galeri.show', $galeri->id) }}" class="hover:text-blue-600">
                                    {{ $galeri->judul }}
                                </a>
                            </h2>
                            @if ($galeri->deskripsi)
                                <p class="text-gray-600 text-sm">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                            @endif
                            <span class="text-sm text-gray-400 block mb-4">
                                Dibuat: {{ $galeri->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $galeris->links() }}
            </div>
        @else
            <p class="text-center text-gray-500">Belum ada galeri tersedia.</p>
        @endif
    </div>
@endsection
