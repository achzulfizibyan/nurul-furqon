@extends('client.layouts.client')

@section('title', 'Formulir Pendaftaran Santri Baru')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold text-center mb-10">Formulir Pendaftaran Santri Baru</h1>
        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('client.psb.store') }}" method="POST" class="space-y-12 bg-white shadow rounded-lg p-8">
            @csrf

            {{-- Section Biodata Peserta Didik --}}
            <div>
                <h2 class="text-xl font-semibold mb-6 border-b pb-2">Biodata Peserta Didik</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Nama Lengkap --}}
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Contoh: Ach. Zulfi Zibyan" value="{{ old('nama') }}">
                        @error('nama')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NISN --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NISN</label>
                        <input type="text" name="nisn"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            placeholder="Contoh: 1234567890" pattern="[0-9]{10}" required>
                    </div>

                    {{-- Nomor KK --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor KK</label>
                        <input type="text" name="no_kk"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                    </div>

                    {{-- NIK --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" name="nik"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    {{-- Alamat Lengkap --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <div class="grid md:grid-cols-2 gap-4">
                            {{-- Provinsi --}}
                            <div>
                                <label class="text-xs text-gray-600">Provinsi</label>
                                <select id="provinsi" name="provinsi"
                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                                    required>
                                    <option value="">-- Pilih Provinsi --</option>
                                </select>
                            </div>

                            {{-- Kabupaten/Kota --}}
                            <div>
                                <label class="text-xs text-gray-600">Kabupaten/Kota</label>
                                <select id="kabupaten" name="kabupaten"
                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                                    required>
                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                </select>
                            </div>

                            {{-- Kecamatan --}}
                            <div>
                                <label class="text-xs text-gray-600">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan"
                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                                    required>
                                    <option value="">-- Pilih Kecamatan --</option>
                                </select>
                            </div>

                            {{-- Kode Pos --}}
                            <div>
                                <label class="text-xs text-gray-600">Kode Pos</label>
                                <input type="text" name="kode_pos"
                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                                    placeholder="Contoh: 67291" pattern="[0-9]{5}" required>
                            </div>

                            {{-- Detail Jalan / RT / RW --}}
                            <div class="md:col-span-2">
                                <label class="text-xs text-gray-600">Detail Jalan / RT / RW</label>
                                <input type="text" name="detail_alamat"
                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                                    placeholder="Contoh: Jl. Pesantren No. 123 RT 02 RW 03" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section Rencana Pendidikan --}}
            <div>
                <h2 class="text-xl font-semibold mb-6 border-b pb-2">Rencana Pendidikan</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenjang Pendidikan</label>
                        <select name="jenjang"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Madrasah Tsanawiyah">Madrasah Tsanawiyah</option>
                            <option value="Madrasah Aliyah">Madrasah Aliyah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Program Tambahan</label>
                        <select name="program_tambahan"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500">
                            <option value="">-- Pilih --</option>
                            <option value="Tahfidz Qur'an">Tahfidz Qur'an</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Motivasi Masuk Pesantren</label>
                        <textarea name="motivasi" rows="3"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"></textarea>
                    </div>
                </div>
            </div>

            {{-- Section Akun Pendaftaran --}}
            <div>
                <h2 class="text-xl font-semibold mb-6 border-b pb-2">Akun Pendaftaran</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                        <input type="email" name="email" placeholder="Masukkan alamat email aktif"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                        <p class="text-xs text-gray-500 mt-1">Email digunakan untuk menerima informasi akun dan status
                            pendaftaran.</p>
                    </div>

                    {{-- Nomor HP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="text" name="no_hp" placeholder="Contoh: +6281234567890"
                            class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-sky-500 focus:border-sky-500"
                            required>
                        <p class="text-xs text-gray-500 mt-1">Nomor HP digunakan jika kami perlu menghubungi Anda terkait
                            pendaftaran.</p>
                    </div>
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-sky-600 text-white px-8 py-3 rounded-lg shadow hover:bg-sky-700 transition">
                    Kirim Pendaftaran
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Script khusus halaman ini
        // Misalnya validasi password
        document.addEventListener("DOMContentLoaded", function() {
            const password = document.querySelector('input[name="password"]');
            const confirm = document.querySelector('input[name="password_confirmation"]');

            confirm.addEventListener("input", function() {
                if (confirm.value !== password.value) {
                    confirm.setCustomValidity("Password tidak sama");
                } else {
                    confirm.setCustomValidity("");
                }
            });
        });
    </script>
@endpush
