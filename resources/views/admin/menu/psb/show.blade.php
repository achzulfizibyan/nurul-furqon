@extends('admin.layouts.app')

@section('title', 'Detail Pendaftar PSB')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Detail Pendaftar</h1>

        <div class="bg-white shadow rounded p-6">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <dt class="font-semibold">Nama Lengkap</dt>
                    <dd>{{ $psb->nama }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Email</dt>
                    <dd>{{ $psb->email }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">No HP</dt>
                    <dd>{{ $psb->no_hp }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">NISN</dt>
                    <dd>{{ $psb->nisn }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">No KK</dt>
                    <dd>{{ $psb->no_kk }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">NIK</dt>
                    <dd>{{ $psb->nik }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Tempat Lahir</dt>
                    <dd>{{ $psb->tempat_lahir }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Tanggal Lahir</dt>
                    <dd>{{ \Carbon\Carbon::parse($psb->tanggal_lahir)->format('d M Y') }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Jenis Kelamin</dt>
                    <dd>{{ $psb->jenis_kelamin }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Provinsi</dt>
                    <dd>{{ $psb->provinsi }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Kabupaten</dt>
                    <dd>{{ $psb->kabupaten }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Kecamatan</dt>
                    <dd>{{ $psb->kecamatan }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Kode Pos</dt>
                    <dd>{{ $psb->kode_pos }}</dd>
                </div>
                <div class="col-span-2">
                    <dt class="font-semibold">Detail Alamat</dt>
                    <dd>{{ $psb->detail_alamat }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Jenjang</dt>
                    <dd>{{ $psb->jenjang }}</dd>
                </div>
                <div>
                    <dt class="font-semibold">Program Tambahan</dt>
                    <dd>{{ $psb->program_tambahan ?? '-' }}</dd>
                </div>
                <div class="col-span-2">
                    <dt class="font-semibold">Motivasi</dt>
                    <dd>{{ $psb->motivasi ?? '-' }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('admin.psb.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Kembali
            </a>
            <a href="{{ route('admin.psb.edit', $psb->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Edit
            </a>
            <a href="{{ route('admin.psb.export', $psb->id) }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Export PDF
            </a>
            <form action="{{ route('admin.psb.destroy', $psb->id) }}" method="POST"
                onsubmit="return confirm('Yakin hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>
        </div>
    </div>
@endsection
