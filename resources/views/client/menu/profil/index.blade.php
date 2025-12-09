<!-- resources/views/client/profil.blade.php -->
@extends('client.layouts.client')
@section('title', 'Profil')

@section('content')

    <div class="container mx-auto py-16 px-6">

        {{-- Judul Halaman --}}
        <h2 class="text-3xl font-bold mb-6">Profil Pondok Pesantren Nurul Furqon</h2>

        {{-- Deskripsi Umum --}}
        <p class="leading-relaxed text-gray-700 max-w-3xl mb-10">
            Pondok Pesantren Nurul Furqon adalah lembaga pendidikan Islam yang berfokus pada pembinaan akhlak,
            pendalaman ilmu agama, serta pembentukan karakter santri. Sejak berdiri, pesantren ini berkomitmen
            untuk menjadi pusat pendidikan yang unggul dan bermanfaat bagi masyarakat.
        </p>

        {{-- SEJARAH --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-4">Sejarah Singkat</h3>
            <p class="text-gray-700 leading-relaxed max-w-3xl">
                Pondok Pesantren Nurul Furqon didirikan sebagai wadah pembelajaran agama yang terstruktur dan
                mendalam. Berawal dari sebuah kelompok pengajian kecil, pesantren ini berkembang menjadi lembaga
                pendidikan formal dan non-formal yang telah melahirkan banyak lulusan yang berkontribusi di berbagai
                bidang kehidupan.
            </p>
        </section>

        {{-- VISI --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-4">Visi</h3>
            <p class="text-gray-700 leading-relaxed max-w-3xl">
                Menjadi pesantren unggul dan mandiri melalui pendidikan, pengkaderan, dakwah, dan pemberdayaan masyarakat.
            </p>
        </section>

        {{-- MISI --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-4">Misi</h3>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li>Menyelenggarakan pendidikan sesuai jenjang dan jenis.</li>
                <li>Melakukan kaderisasi untuk melanjutkan perjuangan pendahulu.</li>
                <li>Menyelenggarakan dakwah lisan, tulisan, maupun tindakan.</li>
                <li>Mengusahakan masyarakat mandiri dan sejahtera.</li>
                <li>Mencapai kemandirian pesantren, khususnya di bidang ekonomi.</li>
            </ul>
        </section>

        {{-- TUJUAN --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-4">Tujuan</h3>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li>Membentuk pribadi saleh, mandiri, berilmu, berjuang, dan berbakti.</li>
                <li>Mewujudkan masyarakat mandiri dan sejahtera lahir batin di dunia akhirat.</li>
            </ul>
        </section>

        {{-- FILOSOFI LOGO --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-4">Filosofi Logo</h3>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li><strong>Bentuk bulat:</strong> ilmu tidak bertepi.</li>
                <li><strong>Bintang di atas:</strong> cita-cita santri setinggi langit.</li>
                <li><strong>Kubah masjid:</strong> ukhuwah Islamiyah dan pengabdian kepada Allah.</li>
                <li><strong>Menara dengan tangga:</strong> dakwah bertahap dan terencana.</li>
                <li><strong>Empat kitab (Al-Qur’an, Hadits, Ijma’, Qiyas):</strong> dasar hukum ilmu pengetahuan.</li>
            </ul>

            <h4 class="text-xl font-semibold mt-6 mb-2">Makna Warna</h4>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li><strong>Putih:</strong> kesucian.</li>
                <li><strong>Hijau:</strong> harapan.</li>
                <li><strong>Biru langit:</strong> kedalaman.</li>
                <li><strong>Kuning:</strong> keindahan.</li>
                <li><strong>Hitam:</strong> keteguhan.</li>
            </ul>
        </section>



        {{-- STRUKTUR PENGURUS --}}
        <section class="mb-16">
            <h3 class="text-2xl font-bold mb-6">Struktur Pengurus</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pengasuh -->
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <img src="{{ asset('img/profil/pengasuh.jpg') }}"
                        class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow">
                    <h4 class="font-semibold text-lg">KH. Nama Pengasuh</h4>
                    <p class="text-gray-600 text-sm">Pengasuh Pondok</p>
                </div>
                <!-- Kepala Madrasah -->
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <img src="{{ asset('img/profil/kamad.jpg') }}"
                        class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow">
                    <h4 class="font-semibold text-lg">Nama Kepala Madrasah</h4>
                    <p class="text-gray-600 text-sm">Kepala Madrasah</p>
                </div>
                <!-- Kepala Tahfidz -->
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <img src="{{ asset('img/profil/tahfidz.jpg') }}"
                        class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow">
                    <h4 class="font-semibold text-lg">Nama Pembina Tahfidz</h4>
                    <p class="text-gray-600 text-sm">Pembina Tahfidz</p>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="text-center mt-20">
            <a href="/psb" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-700">
                Daftar Santri Baru
            </a>
        </section>

    </div>

@endsection
