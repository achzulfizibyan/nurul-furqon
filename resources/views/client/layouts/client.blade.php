<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>

    {{-- Style tambahan per halaman --}}
    @yield('this-page-style')

    {{-- Tinggal gunakan @push('scripts') pada blade halaman --}}
    @stack('scripts')
</head>


<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    @include('client.components.navbar')


    {{-- HEADER KHUSUS (opsional) --}}
    @yield('header')

    {{-- CONTENT UTAMA --}}
    <main class="pt-12">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('client.components.footer')

    {{-- Script tambahan per page --}}
    @yield('this-page-scripts')


    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>

</html>
