@extends('admin.layouts.app')

@section('title', 'Data Pendaftar PSB')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Data Pendaftar Santri Baru</h1>

        {{-- Search + Total --}}
        <div class="flex items-center justify-between mb-4">
            {{-- Form Search --}}
            <form method="GET" action="{{ route('admin.psb.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama, email, NISN, atau No HP" class="border rounded px-3 py-2 w-64"
                    oninput="if(this.value === '') this.form.submit();">
                <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
                    Cari
                </button>
            </form>

            {{-- Total jumlah pendaftar --}}
            <span class="bg-slate-100 text-slate-800 px-4 py-2 rounded font-semibold">
                Total Pendaftar: {{ $psbs->total() }} orang
            </span>
        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel --}}
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">No HP</th>
                    <th class="border px-4 py-2">NISN</th>
                    <th class="border px-4 py-2">Jenjang</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($psbs as $psb)
                    <tr>
                        <td class="border px-4 py-2">{{ $psb->nama }}</td>
                        <td class="border px-4 py-2">{{ $psb->email }}</td>
                        <td class="border px-4 py-2">{{ $psb->no_hp }}</td>
                        <td class="border px-4 py-2">{{ $psb->nisn }}</td>
                        <td class="border px-4 py-2">{{ $psb->jenjang }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.psb.show', $psb->id) }}"
                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                Detail
                            </a>
                            <form action="{{ route('admin.psb.destroy', $psb->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border px-4 py-2 text-center text-gray-500">
                            Belum ada data pendaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $psbs->links() }}
        </div>
    </div>
@endsection
