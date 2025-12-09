<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') - Admin Panel</title>
</head>

<body class="bg-gray-100 text-slate-900">

    <div class="flex">
        {{-- Sidebar tetap --}}
        <div class="fixed top-0 left-0 w-64 bg-slate-800 text-white min-h-screen p-6">
            @include('admin.layouts.sidebar')
        </div>

        {{-- Konten utama --}}
        <div class="flex-1 ml-64 p-6">
            @yield('content')
        </div>
    </div>

    {{-- Tempat script tambahan dari child view --}}
    @yield('scripts')
</body>

</html>
