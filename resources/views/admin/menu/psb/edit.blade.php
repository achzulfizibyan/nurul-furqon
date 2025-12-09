@extends('admin.layouts.app')

@section('title', 'Edit Data Pendaftar PSB')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Data Pendaftar</h1>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.psb.update', $psb->id) }}" method="POST" class="grid grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            {{-- Kolom kiri --}}
            <div class="space-y-4">
                <div>
                    <label class="block font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $psb->email) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $psb->no_hp) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $psb->nama) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn', $psb->nisn) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">No KK</label>
                    <input type="text" name="no_kk" value="{{ old('no_kk', $psb->no_kk) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">NIK</label>
                    <input type="text" name="nik" value="{{ old('nik', $psb->nik) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $psb->tempat_lahir) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $psb->tanggal_lahir) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="border rounded px-3 py-2 w-full">
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $psb->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $psb->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>
            </div>

            {{-- Kolom kanan --}}
            <div class="space-y-4">
                <div>
                    <label class="block font-semibold">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ old('provinsi', $psb->provinsi) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Kabupaten</label>
                    <input type="text" name="kabupaten" value="{{ old('kabupaten', $psb->kabupaten) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan', $psb->kecamatan) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ old('kode_pos', $psb->kode_pos) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Detail Alamat</label>
                    <textarea name="detail_alamat" class="border rounded px-3 py-2 w-full">{{ old('detail_alamat', $psb->detail_alamat) }}</textarea>
                </div>
                <div>
                    <label class="block font-semibold">Jenjang</label>
                    <input type="text" name="jenjang" value="{{ old('jenjang', $psb->jenjang) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Program Tambahan</label>
                    <input type="text" name="program_tambahan"
                        value="{{ old('program_tambahan', $psb->program_tambahan) }}"
                        class="border rounded px-3 py-2 w-full">
                </div>
                <div>
                    <label class="block font-semibold">Motivasi</label>
                    <textarea name="motivasi" class="border rounded px-3 py-2 w-full">{{ old('motivasi', $psb->motivasi) }}</textarea>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="col-span-2 flex gap-2 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.psb.show', $psb->id) }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
