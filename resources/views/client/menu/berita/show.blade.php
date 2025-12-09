@extends('client.layouts.client')
@section('title', 'Berita')
@section('content')

    <div class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold mb-6">{{ $data->judul }}</h2>

        <p class="text-gray-500 mb-2">
            Dipublikasikan pada {{ $data->created_at->format('d M Y') }}
        </p>

        {{-- tampilkan kategori --}}
        <p class="text-gray-500 mb-4">
            Kategori: {{ $data->kategori ? $data->kategori->nama : '-' }}
        </p>

        @if ($data->gambar)
            <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                class="w-full h-96 object-cover rounded-lg mb-6">
        @endif

        <div class="prose max-w-none">
            {!! $data->isi !!}
        </div>

        <hr class="my-8">

        <h3 class="text-2xl font-semibold mb-4">Berita Lainnya</h3>
        <ul class="list-disc pl-5">
            @foreach ($lainnya as $item)
                <li>
                    <a href="{{ route('client.menu.berita.show', $item->slug) }}" class="text-blue-600 hover:underline">
                        {{ $item->judul }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
