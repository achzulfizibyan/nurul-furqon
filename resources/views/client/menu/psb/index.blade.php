@extends('client.layouts.client')

@section('title', 'Pendaftaran Santri Baru')

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-r from-sky-600 to-indigo-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Pendaftaran Santri Baru</h1>
            <p class="text-lg max-w-2xl mx-auto">
                Selamat datang di halaman Pendaftaran Santri Baru Yayasan Nurul Furqon.
                Mari bergabung bersama kami untuk menempuh pendidikan Islami yang berkualitas.
            </p>
            <a href="{{ route('client.menu.psb.formulir') }}"
                class="mt-6 inline-block bg-white text-sky-700 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">
                Mulai Pendaftaran
            </a>
        </div>
    </section>

    {{-- Alur Pendaftaran Online --}}
    <section id="alur-online" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Alur Pendaftaran Online</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-sky-600 text-3xl font-bold">1</span>
                    <h3 class="font-semibold mt-4">Isi Formulir</h3>
                    <p class="text-sm text-gray-600 mt-2">Lengkapi data santri dan orang tua secara online.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-sky-600 text-3xl font-bold">2</span>
                    <h3 class="font-semibold mt-4">Upload Berkas</h3>
                    <p class="text-sm text-gray-600 mt-2">Unggah dokumen persyaratan sesuai ketentuan.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-sky-600 text-3xl font-bold">3</span>
                    <h3 class="font-semibold mt-4">Konfirmasi</h3>
                    <p class="text-sm text-gray-600 mt-2">Tunggu verifikasi dari admin pesantren.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-sky-600 text-3xl font-bold">4</span>
                    <h3 class="font-semibold mt-4">Cetak Bukti</h3>
                    <p class="text-sm text-gray-600 mt-2">Cetak bukti pendaftaran untuk dibawa saat penyerahan santri.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Persyaratan Berkas --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-10 text-center">Persyaratan Berkas</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col items-center bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-sky-600 text-4xl mb-4">📄</div>
                    <h3 class="font-semibold text-gray-800">Fotokopi Akta Kelahiran</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">1 lembar, jelas dan terbaca.</p>
                </div>

                <div class="flex flex-col items-center bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-sky-600 text-4xl mb-4">📄</div>
                    <h3 class="font-semibold text-gray-800">Fotokopi Kartu Keluarga</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">1 lembar, sesuai data terbaru.</p>
                </div>

                <div class="flex flex-col items-center bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-sky-600 text-4xl mb-4">🪪</div>
                    <h3 class="font-semibold text-gray-800">Fotokopi KTP Orang Tua/Wali</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">1 lembar, jelas dan valid.</p>
                </div>

                <div class="flex flex-col items-center bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-sky-600 text-4xl mb-4">🖼️</div>
                    <h3 class="font-semibold text-gray-800">Pas Foto Santri</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">Ukuran 3x4, 3 lembar, background biru.</p>
                </div>

                <div class="flex flex-col items-center bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-sky-600 text-4xl mb-4">🏥</div>
                    <h3 class="font-semibold text-gray-800">Surat Keterangan Sehat</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">Dari dokter/puskesmas, terbaru.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Alur Penyerahan Santri --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Alur Penyerahan Santri</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-indigo-600 text-3xl font-bold">1</span>
                    <h3 class="font-semibold mt-4">Datang ke Pesantren</h3>
                    <p class="text-sm text-gray-600 mt-2">Bawa bukti pendaftaran dan berkas asli.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-indigo-600 text-3xl font-bold">2</span>
                    <h3 class="font-semibold mt-4">Serahkan ke Panitia</h3>
                    <p class="text-sm text-gray-600 mt-2">Panitia akan memeriksa kelengkapan berkas.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <span class="text-indigo-600 text-3xl font-bold">3</span>
                    <h3 class="font-semibold mt-4">Santri Diterima</h3>
                    <p class="text-sm text-gray-600 mt-2">Santri resmi diterima dan mulai mengikuti kegiatan pesantren.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Informasi Pelayanan Pendaftaran --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-10">Informasi Pelayanan Pendaftaran</h2>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Jadwal --}}
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition flex flex-col items-center">
                    <div class="text-sky-600 text-4xl mb-4">🕒</div>
                    <h3 class="font-semibold text-gray-800">Jadwal Pelayanan</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">
                        Setiap hari kerja <br> Pukul 08.00 - 15.00 WIB
                    </p>
                </div>

                {{-- Lokasi --}}
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition flex flex-col items-center">
                    <div class="text-sky-600 text-4xl mb-4">📍</div>
                    <h3 class="font-semibold text-gray-800">Lokasi Pendaftaran</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">
                        Kantor Pendaftaran Yayasan Nurul Furqon <br> Jl. Pesantren No. 123, Paiton
                    </p>
                </div>

                {{-- Kontak --}}
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition flex flex-col items-center">
                    <div class="text-sky-600 text-4xl mb-4">📱</div>
                    <h3 class="font-semibold text-gray-800">Kontak Admin</h3>
                    <p class="text-sm text-gray-600 mt-2 text-center">
                        Hubungi admin via WhatsApp untuk informasi lebih lanjut.
                    </p>
                    <a href="https://wa.me/6281234567890?text=Assalamu'alaikum%20Admin%20Nurul%20Furqon,%20saya%20ingin%20bertanya%20tentang%20pendaftaran%20santri%20baru."
                        target="_blank"
                        class="mt-4 inline-block bg-sky-600 text-white px-5 py-2 rounded-lg shadow hover:bg-sky-700 transition">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
