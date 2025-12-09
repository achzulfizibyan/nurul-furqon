@extends('client.layouts.client')
@section('title', 'Beranda')

@section('content')

    {{-- ========================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================= --}}
    <section class="relative bg-gradient-to-br from-blue-700 via-sky-400 to-teal-300 text-white pt-36 pb-20">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <div>
                <h1 class="text-5xl font-bold leading-tight mb-4">
                    Selamat Datang di <span class="text-yellow-300">Pondok Pesantren Nurul Furqon</span>
                </h1>
                <p class="text-lg mb-6">
                    Tempat pendidikan yang mengutamakan akhlak, keilmuan, dan pembentukan karakter santri
                    untuk masa depan yang cerah dan penuh berkah.
                </p>
                <a href="/psb" class="bg-orange-500 px-6 py-3 rounded-lg font-semibold hover:bg-orange-600">Daftar
                    Sekarang</a>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('img/beranda/pengasuh.jpg') }}"
                    class="w-72 h-72 rounded-2xl shadow-xl border-4 border-white object-cover" alt="Kepala Pesantren">
            </div>

        </div>
    </section>

    {{-- ========================= --}}
    {{-- STATISTIK SANTRI / GURU / ALUMNI --}}
    {{-- ========================= --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-12">Statistik Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-5xl font-bold text-blue-600 mb-2">500</h3>
                    <p class="text-gray-600 font-semibold">Santri</p>
                </div>

                <div class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-5xl font-bold text-green-600 mb-2">30</h3>
                    <p class="text-gray-600 font-semibold">Guru / Ustadz</p>
                </div>

                <div class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-5xl font-bold text-yellow-500 mb-2">2000</h3>
                    <p class="text-gray-600 font-semibold">Alumni</p>
                </div>

            </div>

        </div>
    </section>


    {{-- ========================= --}}
    {{-- USP / KEUNGGULAN --}}
    {{-- ========================= --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-12">Mengapa Memilih Kami?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3">Pendidikan Berkarakter</h3>
                    <p class="text-gray-600">Pembentukan akhlak menjadi pondasi utama bagi setiap santri.</p>
                </div>

                <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3">Pengajar Berkompeten</h3>
                    <p class="text-gray-600">Didukung ustadz dan ustadzah berpengalaman dan profesional.</p>
                </div>

                <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-3">Lingkungan Nyaman</h3>
                    <p class="text-gray-600">Santri belajar di lingkungan yang aman, nyaman, dan kondusif.</p>
                </div>

            </div>

        </div>
    </section>



    {{-- ========================= --}}
    {{-- PROGRAM PENDIDIKAN --}}
    {{-- ========================= --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-12">Program Pendidikan</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div class="bg-white shadow rounded-xl p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-bold mb-3">Madrasah Diniyah</h3>
                    <p class="text-gray-600">Pembelajaran dasar ilmu agama untuk pondasi pemahaman syariat.</p>
                </div>

                <div class="bg-white shadow rounded-xl p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-bold mb-3">Tahfidz Al-Qur'an</h3>
                    <p class="text-gray-600">Program unggulan bagi santri penghafal Al-Qur’an.</p>
                </div>

                <div class="bg-white shadow rounded-xl p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-bold mb-3">Sekolah Formal</h3>
                    <p class="text-gray-600">Jenjang pendidikan mulai dari MI, MTs, hingga MA.</p>
                </div>

            </div>

        </div>
    </section>

    {{-- ========================= --}}
    {{-- BERITA TERBARU --}}
    {{-- ========================= --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-10">Berita & Pengumuman</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @foreach ($berita as $b)
                    <div class="bg-gray-100 rounded-xl shadow hover:shadow-xl transition overflow-hidden">
                        <img src="{{ Storage::url($b->gambar) }}" class="w-full h-48 object-cover" alt="">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2">{{ $b->judul }}</h3>
                            <p class="text-gray-600">{{ Str::limit($b->isi, 80) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="/berita" class="text-blue-600 font-semibold">Lihat Semua Berita →</a>
            </div>

        </div>
    </section>



    {{-- ========================= --}}
    {{-- GALERI TERBARU --}}
    {{-- ========================= --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-10">Galeri Kegiatan Terbaru</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                @foreach ($galeri as $item)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit($item->deskripsi, 80) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="/galeri"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
                    Lihat Selengkapnya
                </a>
            </div>

        </div>
    </section>

@endsection
