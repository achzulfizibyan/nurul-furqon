@extends('client.layouts.client')

@section('content')
    <div class="max-w-3xl mx-auto mt-16">
        <div class="bg-white shadow-lg rounded-xl p-10 text-center">

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="flex items-center justify-center mb-8">
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg flex items-center gap-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Pendaftaran Santri Baru Berhasil
            </h1>
            <p class="text-gray-600 mb-10">
                Terima kasih telah melakukan pendaftaran. Silakan simpan bukti pendaftaran Anda dalam bentuk PDF atau
                hubungi panitia jika ada pertanyaan.
            </p>

            {{-- Tombol Aksi --}}
            <div class="flex flex-wrap justify-center gap-6">
                {{-- Export PDF --}}
                <a href="{{ route('client.psb.export', $psb->id ?? 1) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition flex items-center gap-2">
                    📄 Export ke PDF
                </a>

                {{-- Kembali ke Menu Utama --}}
                <a href="{{ route('client.menu.psb.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg shadow-md transition flex items-center gap-2">
                    ⬅️ Kembali ke Menu Utama
                </a>

                {{-- Chat Panitia PSB (WhatsApp) --}}
                <a href="https://wa.me/6281234567890?text=Assalamu'alaikum%20Panitia%20PSB,%20saya%20sudah%20mendaftar%20online.%20Mohon%20informasi%20lebih%20lanjut."
                    target="_blank"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-md transition flex items-center gap-2">
                    {{-- Ikon WhatsApp --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-white"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 0C5.373 0 0 5.373 0 12c0 2.12.553 4.19 1.6 6.01L0 24l6.17-1.61A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22a9.94 9.94 0 01-5.09-1.39l-.36-.21-3.65.95.97-3.56-.24-.37A9.94 9.94 0 012 12c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.13-7.47c-.28-.14-1.65-.81-1.91-.9-.26-.1-.45-.14-.64.14-.19.28-.73.9-.9 1.08-.17.19-.33.21-.61.07-.28-.14-1.18-.43-2.25-1.37-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.09-.19.05-.36-.02-.5-.07-.14-.64-1.54-.88-2.11-.23-.55-.47-.47-.64-.48h-.55c-.19 0-.5.07-.76.36-.26.28-1 1-1 2.43s1.02 2.82 1.16 3.01c.14.19 2.01 3.07 4.87 4.3.68.29 1.21.46 1.62.59.68.22 1.3.19 1.79.12.55-.08 1.65-.67 1.88-1.32.23-.65.23-1.21.16-1.32-.07-.12-.26-.19-.54-.33z" />
                    </svg>
                    Chat Panitia PSB
                </a>
            </div>
        </div>
    </div>
@endsection
