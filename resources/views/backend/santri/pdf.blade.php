<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Santri</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #eee; }
        img.logo { width: 100px; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        @if($logoPath)
            <img src="{{ $logoPath }}" class="logo">
        @endif
        <h2>Data Santri</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Nama Orangtua</th>
                <th>Kurikulum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($santris as $index => $santri)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $santri->nama }}</td>
                <td>{{ $santri->nik }}</td>
                <td>{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $santri->no_hp }}</td>
                <td>{{ $santri->nama_orangtua }}</td>
                <td>{{ $santri->kurikulum }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
