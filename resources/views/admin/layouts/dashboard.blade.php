@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        {{-- Statistik utama --}}
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-lg font-semibold">Total Berita</h2>
                <p class="text-3xl font-bold text-sky-600">{{ $totalBerita }}</p>
            </div>
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-lg font-semibold">Total Donasi</h2>
                <p class="text-3xl font-bold text-green-600">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-lg font-semibold">Total Pendaftar PSB</h2>
                <p class="text-3xl font-bold text-indigo-600">{{ $totalPsb }}</p>
            </div>
        </div>

        {{-- Grafik contoh --}}
        <div class="bg-white shadow rounded p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Grafik Pendaftar PSB per Bulan</h2>
            <canvas id="psbChart"></canvas>
        </div>

        {{-- Aktivitas terbaru --}}
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h2>
            <ul class="list-disc pl-5 space-y-2">
                @foreach ($latestBerita as $berita)
                    <li>{{ $berita->judul }} ({{ $berita->created_at->format('d M Y') }})</li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('psbChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($bulan),
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: @json($jumlahPendaftar),
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false,
                }]
            }
        });
    </script>
@endsection
