<div class="fixed top-0 left-0 w-64 bg-slate-800 text-white min-h-screen p-6">
    <h2 class="text-xl font-bold mb-8">Admin Panel</h2>

    <ul class="space-y-2">
        {{-- Dashboard --}}
        <li>
            <a href="{{ route('admin.layouts.dashboard') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.layouts.dashboard') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Dashboard
            </a>
        </li>

        {{-- Berita --}}
        <li>
            <a href="{{ route('admin.berita.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.berita.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Berita
            </a>
        </li>

        {{-- Galeri --}}
        <li>
            <a href="{{ route('admin.galeri.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.galeri.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Galeri
            </a>
        </li>

        {{-- Download --}}
        <li>
            <a href="{{ route('admin.download.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.download.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Download
            </a>
        </li>

        {{-- Donasi --}}
        <li>
            <a href="{{ route('admin.donasi.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.donasi.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Donasi
            </a>
        </li>

        {{-- PSB --}}
        <li>
            <a href="{{ route('admin.psb.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.psb.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                PSB
            </a>
        </li>

        {{-- Kategori --}}
        <li>
            <a href="{{ route('admin.kategori.index') }}"
                class="block py-2 px-3 rounded
                      hover:bg-slate-700 hover:text-sky-400
                      {{ request()->routeIs('admin.kategori.*') ? 'bg-slate-700 text-sky-400 font-semibold' : '' }}">
                Kategori
            </a>
        </li>

        {{-- Logout --}}
        <li class="pt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left py-2 px-3 rounded
                               bg-red-600 hover:bg-red-700 text-white font-semibold">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
