<nav class="bg-blue-600 text-white fixed top-0 left-0 w-full z-50 shadow md:hidden">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('img/navbar/logo.png') }}" alt="Logo Pesantren"
                    class="w-12 h-12 object-contain drop-shadow-md">
                <div class="leading-tight flex flex-col">
                    <span class="text-xs font-semibold tracking-wide block">Pondok Pesantren</span>
                    <span class="text-lg font-bold tracking-wide block">Nurul Furqon</span>
                </div>
            </a>

            {{-- Hamburger --}}
            <button id="menu-btn" class="focus:outline-none z-50 relative">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Overlay --}}
    <div id="overlay"
        class="fixed inset-0 bg-black bg-opacity-50 hidden opacity-0 transition-opacity duration-500 ease-in-out z-40">
    </div>

    {{-- Drawer Menu --}}
    <div id="menu"
        class="fixed top-0 left-0 h-full w-64 bg-blue-700 text-white
        transform -translate-x-full transition-transform duration-500 ease-in-out z-50 p-6 flex flex-col space-y-4">

        {{-- Tombol Close (X) --}}
        <button id="close-btn" class="self-end mb-4 focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Beranda --}}
        <a href="{{ url('/') }}"
            class="flex items-center gap-2 {{ request()->is('/') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10" />
            </svg>
            Beranda
        </a>

        {{-- Profil --}}
        <a href="{{ url('/profil') }}"
            class="flex items-center gap-2 {{ request()->is('profil') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5.121 17.804A9 9 0 1118 12.9M15 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2" />
            </svg>
            Profil
        </a>

        {{-- Berita --}}
        <a href="{{ url('/berita') }}"
            class="flex items-center gap-2 {{ request()->is('berita*') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h9l7 7v7a2 2 0 01-2 2z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 21V13H9" />
            </svg>
            Berita
        </a>

        {{-- Galeri --}}
        <a href="{{ url('/galeri') }}"
            class="flex items-center gap-2 {{ request()->is('galeri') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m0 0l3.293-3.293a1 1 0 011.414 0L22 14m-6 2H4" />
            </svg>
            Galeri
        </a>

        {{-- Download --}}
        <a href="{{ url('/download') }}"
            class="flex items-center gap-2 {{ request()->is('download') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2h16v-2M12 4v12m0 0l-4-4m4 4l4-4" />
            </svg>
            Download
        </a>

        {{-- Donasi --}}
        <a href="{{ url('/donasi') }}"
            class="flex items-center gap-2 {{ request()->is('donasi') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2s-3 1.343-3 3 1.343 3 3 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2" />
            </svg>
            Donasi
        </a>

        {{-- PSB --}}
        <a href="{{ url('/psb') }}"
            class="flex items-center gap-2 {{ request()->is('psb*') ? 'text-yellow-300 font-bold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6" />
            </svg>
            PSB
        </a>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    const overlay = document.getElementById('overlay');
    const closeBtn = document.getElementById('close-btn');

    // Buka drawer
    menuBtn.addEventListener('click', () => {
        menu.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
    });

    // Tutup drawer dengan overlay
    overlay.addEventListener('click', () => {
        menu.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 500);
    });

    // Tutup drawer dengan tombol X
    closeBtn.addEventListener('click', () => {
        menu.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 500);
    });
</script>
