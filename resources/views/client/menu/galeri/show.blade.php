@extends('client.layouts.client')

@section('title', $galeri->judul)

@section('content')
    <div class="container mx-auto px-4 py-8 mt-8">
        <h1 class="text-3xl font-bold mb-4">{{ $galeri->judul }}</h1>
        <p class="text-gray-500 text-sm mb-6">Dibuat: {{ $galeri->created_at->format('d M Y H:i') }}</p>

        <!-- Thumbnail -->
        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
            class="w-full max-h-96 object-cover rounded cursor-pointer"
            onclick="openModal('{{ asset('storage/' . $galeri->gambar) }}')">

        @if ($galeri->deskripsi)
            <div class="prose max-w-none mt-6">
                {!! nl2br(e($galeri->deskripsi)) !!}
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('client.menu.galeri.index') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali ke Galeri</a>
        </div>
    </div>

    <!-- Modal untuk memperbesar gambar -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50">
        <span class="absolute top-4 right-6 text-white text-3xl cursor-pointer" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" class="max-h-full max-w-full rounded shadow-lg">
    </div>

    <script>
        function openModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }
    </script>
@endsection
