@extends('client.layouts.client')

@section('title', 'Metode Pembayaran')

@section('content')
    <div class="container mx-auto py-16 px-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            {{-- Banner Program Donasi --}}
            @if ($donasi->gambar)
                <img src="{{ asset('storage/' . $donasi->gambar) }}" alt="{{ $donasi->judul }}"
                    class="w-full h-64 object-cover">
            @endif

            <div class="p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">Metode Pembayaran</h1>

                {{-- Ringkasan Donasi --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-8">
                    <h2 class="text-lg font-semibold mb-4">Ringkasan Donasi</h2>
                    <div class="space-y-3 text-sm text-gray-700">
                        <div class="flex justify-between">
                            <span>Nama Donatur</span>
                            <span class="font-medium">{{ $donatur->nama }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Nominal Donasi</span>
                            <span class="font-medium">Rp {{ number_format($donatur->jumlah, 0, ',', '.') }}</span>
                        </div>
                        @php
                            $biaya_platform = ceil($donatur->jumlah * 0.05);
                            $total = $donatur->jumlah + $biaya_platform;
                        @endphp
                        <div class="flex justify-between">
                            <span>Biaya Platform</span>
                            <span class="font-medium">Rp {{ number_format($biaya_platform, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between font-semibold text-blue-600">
                            <span>Total Donasi</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Pilihan Metode Pembayaran --}}
                <h2 class="text-xl font-semibold mb-6 text-center">Pilih Metode Pembayaran</h2>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Bank Sultra --}}
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            Bank Sultra
                        </h3>

                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex flex-col items-start">
                                <span class="text-2xl font-bold text-slate-800 tracking-wide">
                                    123-456-7890
                                </span>
                                <span class="text-sm text-gray-600 mt-1">
                                    a.n Yayasan Nurul Furqon
                                </span>
                            </li>
                        </ul>
                        <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            Bank BRI
                        </h3>

                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex flex-col items-start">
                                <span class="text-2xl font-bold text-slate-800 tracking-wide">
                                    123-456-7890
                                </span>
                                <span class="text-sm text-gray-600 mt-1">
                                    a.n Yayasan Nurul Furqon
                                </span>
                            </li>
                        </ul>

                        <p class="mt-4 text-xs text-gray-500 italic">
                            Simpan bukti transfer untuk konfirmasi.
                        </p>
                    </div>

                    {{-- E-Wallet --}}
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                            E-Wallet
                        </h3>
                        <div class="text-sm text-gray-700">
                            <form action="{{ route('client.donasi.ewallet', [$donasi->id, $donatur->id]) }}" method="POST"
                                class="space-y-3">
                                @csrf
                                <button type="submit" name="ewallet" value="OVO"
                                    class="flex items-center gap-2 w-full py-2 px-4 border rounded hover:bg-gray-100 transition">
                                    <img src="{{ asset('img/donasi/ovo.png') }}" alt="OVO" class="w-6 h-6"> Bayar
                                    dengan OVO
                                </button>
                                <button type="submit" name="ewallet" value="GOPAY"
                                    class="flex items-center gap-2 w-full py-2 px-4 border rounded hover:bg-gray-100 transition">
                                    <img src="{{ asset('img/donasi/gopay.png') }}" alt="GoPay" class="w-6 h-6"> Bayar
                                    dengan GoPay
                                </button>
                                <button type="submit" name="ewallet" value="DANA"
                                    class="flex items-center gap-2 w-full py-2 px-4 border rounded hover:bg-gray-100 transition">
                                    <img src="{{ asset('img/donasi/dana.png') }}" alt="Dana" class="w-6 h-6"> Bayar
                                    dengan Dana
                                </button>
                                <button type="submit" name="ewallet" value="SHOPEEPAY"
                                    class="flex items-center gap-2 w-full py-2 px-4 border rounded hover:bg-gray-100 transition">
                                    <img src="{{ asset('img/donasi/shoope.webp') }}" alt="ShopeePay" class="w-6 h-6"> Bayar
                                    dengan ShopeePay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- QRIS --}}
                <div class="mt-8 text-center border rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-800 mb-3">Pembayaran QRIS</h3>
                    <p class="text-sm text-gray-700 mb-4">
                        Scan QR code berikut menggunakan aplikasi bank atau e-wallet Anda:
                    </p>

                    <div class="flex justify-center">
                        {!! QrCode::size(200)->generate($qris['qr_string']) !!}
                    </div>

                    <p class="mt-2 text-xs text-gray-500 italic">
                        QRIS dapat digunakan untuk semua bank dan e-wallet.
                    </p>
                </div>

                {{-- Tombol kembali --}}
                <div class="mt-8 text-center">
                    <a href="{{ route('client.donasi.show', $donasi->id) }}"
                        class="inline-block bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600">
                        Kembali ke Program
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
