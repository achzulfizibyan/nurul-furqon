@extends('client.layouts.client')

@section('title', 'Donasi untuk ' . $donasi->judul)

@section('content')
    <div class="container mx-auto py-16 px-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            {{-- Banner --}}
            @if ($donasi->gambar)
                <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="{{ $donasi->judul }}"
                    class="w-full h-64 object-cover">
            @endif

            <div class="p-6">
                <h1 class="text-3xl font-bold mb-6">Donasi untuk: {{ $donasi->judul }}</h1>

                {{-- Form Donasi --}}
                <form action="{{ route('client.donasi.storeDonation', $donasi->id) }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Nominal --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                        <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
                            placeholder="Rp Isi nominal yang diinginkan"
                            class="block w-full border-gray-300 rounded-md shadow-sm mb-3">
                        @error('jumlah')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        {{-- Tombol pilihan cepat --}}
                        <div class="grid grid-cols-4 gap-2">
                            @foreach ([10000, 20000, 50000, 75000, 100000, 250000, 500000, 1000000] as $nominal)
                                <button type="button"
                                    onclick="document.getElementById('jumlah').value={{ $nominal }}; updateDetail();"
                                    class="bg-gray-100 hover:bg-gray-200 text-sm px-3 py-2 rounded text-center">
                                    Rp {{ number_format($nominal, 0, ',', '.') }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                            class="block w-full border-gray-300 rounded-md shadow-sm mb-2">
                        @error('nama')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <div class="space-y-2 text-sm text-gray-700">
                            <label class="flex items-center">
                                <input type="radio" name="nama_opsi" value="hamba"
                                    onclick="document.getElementById('nama').value='Hamba Allah'">
                                <span class="ml-2">Tampilkan sebagai <strong>Hamba Allah</strong></span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="nama_opsi" value="sembunyi"
                                    onclick="document.getElementById('nama').value='A****z'">
                                <span class="ml-2">Sembunyikan nama (cth: <strong>A****z</strong>)</span>
                            </label>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="0812xxxxxxx"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('no_hp')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Catatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Catatan (opsional)</label>
                        <textarea name="catatan" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                    </div>

                    {{-- Ringkasan Donasi --}}
                    <div class="mt-10 bg-gray-50 border border-gray-200 rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-4">Ringkasan Donasi</h2>

                        <div class="text-sm text-gray-700 space-y-2" id="detail-nominal">
                            <div class="flex justify-between">
                                <span>Donasi</span>
                                <span id="donasi-value">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Biaya Platform</span>
                                <span id="platform-value">Rp 0</span>
                            </div>
                            <div class="flex justify-between font-semibold">
                                <span>Total Donasi</span>
                                <span id="total-value">Rp 0</span>
                            </div>
                        </div>

                        <script>
                            function formatRupiah(angka) {
                                return 'Rp ' + angka.toLocaleString('id-ID');
                            }

                            function updateDetail() {
                                let jumlah = parseInt(document.getElementById('jumlah').value) || 0;
                                let biayaPlatform = jumlah > 0 ? Math.ceil(jumlah * 0.05) : 0;
                                let total = jumlah + biayaPlatform;
                                document.getElementById('donasi-value').textContent = formatRupiah(jumlah);
                                document.getElementById('platform-value').textContent = formatRupiah(biayaPlatform);
                                document.getElementById('total-value').textContent = formatRupiah(total);
                            }
                            document.getElementById('jumlah').addEventListener('input', updateDetail);
                            updateDetail();
                        </script>


                        <div class="mt-6">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                                Lanjut Pembayaran
                            </button>
                        </div>
                    </div>

                    {{-- Tombol batal --}}
                    <div class="mt-4">
                        <a href="{{ route('client.donasi.show', $donasi->id) }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
