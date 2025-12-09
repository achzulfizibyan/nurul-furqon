<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Santri Baru</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header {
            margin-bottom: 20px;
        }

        .logo-text {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-text img {
            height: 80px;
        }

        .logo-text .text {
            font-size: 12px;
            line-height: 1.4;
        }

        .logo-text .yayasan {
            font-weight: bold;
            font-size: 14px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .section-title {
            background: #f0f0f0;
            font-weight: bold;
        }
    </style>
</head>

<body>

    {{-- Header --}}
    <div class="header">
        <div class="logo-text">
            <img src="{{ public_path('img/navbar/logo.png') }}" alt="Logo Pesantren">
            <div class="text">
                <div class="pesantren">Pondok Pesantren Nurul Furqon</div>
                <div class="alamat">Jalan KH. Zaini Mun’im, Desa Timu, Kec. Tomia Timur, Kab. Wakatobi, Sulawesi Tenggara
                </div>
                <div class="kontak">Telp. 082249298863 & 082228404574</div>
            </div>
        </div>
        <div class="title">Formulir Pendaftaran Santri Baru</div>
    </div>


    {{-- Biodata --}}
    <table>
        <tr>
            <th colspan="2" class="section-title">Biodata Peserta Didik</th>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>{{ $psb->nama }}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>{{ $psb->nisn }}</td>
        </tr>
        <tr>
            <td>No KK</td>
            <td>{{ $psb->no_kk }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>{{ $psb->nik }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>{{ $psb->tempat_lahir }}, {{ $psb->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $psb->jenis_kelamin }}</td>
        </tr>
    </table>

    {{-- Alamat --}}
    <table>
        <tr>
            <th colspan="2" class="section-title">Alamat</th>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>{{ $psb->provinsi }}</td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>{{ $psb->kabupaten }}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>{{ $psb->kecamatan }}</td>
        </tr>
        <tr>
            <td>Kode Pos</td>
            <td>{{ $psb->kode_pos }}</td>
        </tr>
        <tr>
            <td>Detail Alamat</td>
            <td>{{ $psb->detail_alamat }}</td>
        </tr>
    </table>

    {{-- Rencana Pendidikan --}}
    <table>
        <tr>
            <th colspan="2" class="section-title">Rencana Pendidikan</th>
        </tr>
        <tr>
            <td>Jenjang Pendidikan</td>
            <td>{{ $psb->jenjang }}</td>
        </tr>
        <tr>
            <td>Program Tambahan</td>
            <td>{{ $psb->program_tambahan ?? '-' }}</td>
        </tr>
        <tr>
            <td>Motivasi</td>
            <td>{{ $psb->motivasi ?? '-' }}</td>
        </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top:40px; text-align:right;">
        <p>Paiton, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Panitia Pendaftaran</p>
        <br><br><br>
        <p>(........................................)</p>
    </div>

</body>

</html>
