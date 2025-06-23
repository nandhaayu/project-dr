<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Bukti Pendaftaran Santri</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .header {
            margin-bottom: 20px;
        }

    .header-row {
        display: flex;
        align-items: center; 
    }

    .logo {
        width: 60px;
        height: auto; 
    }

    .header-text {
        margin-left: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }


        .header-text h1 {
            margin: 5px 0;
            font-size: 18px;
            font-weight: bold;
        }

        .header-text p {
            margin: 2px 0;
            font-size: 13px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        hr {
            border: none;
            border-top: 1px solid #555;
            margin: 15px 0;
        }

        .content p {
            margin: 10px 0 20px 0;
            font-size: 14px;
        }

        .no-border td {
        border: none;
        padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        td {
            padding: 8px 10px;
            vertical-align: top;
            border-bottom: 1px solid #ddd;
        }

        td.label {
            width: 40%;
            font-weight: bold;
            color: #333;
        }

        .italic {
            font-style: italic;
            font-size: 13px;
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
        }

        .footer .date {
            font-weight: bold;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <table class="no-border">
        <tr>
            <td><img src="{{ $logoPath }}" alt="Logo" class="logo" /></td>
            <td><div class="header-text">
                <h1>Pondok Pesantren Darur Rohmah</h1>
                <p>Kedung, Buaran, Kec. Mayong, Kabupaten Jepara, Jawa Tengah 59465, Indonesia</p>
                <p>085712225557</p>
            </div></td>
        </tr>
    </table>

    <hr />

    <div class="content">
        <div class="title">Bukti Pendaftaran</div>
        <p>Terima kasih telah melakukan pendaftaran untuk belajar di Pondok Pesantren Darur Rohmah, berikut adalah data calon santri</p>

        <table>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>{{ $pendaftar->nama }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td>{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat / Tanggal Lahir</td>
                <td>{{ $pendaftar->tempat_lahir }} / {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="label">Email / No HP</td>
                <td>{{ $pendaftar->email ?? '-' }} / {{ $pendaftar->no_hp }}</td>
            </tr>
            <tr>
                <td class="label">Nama Orang Tua</td>
                <td>{{ $pendaftar->nama_orangtua }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td>{{ $pendaftar->alamat }}</td>
            </tr>
            <tr>
                <td class="label">Kelas yang dipilih</td>
                <td>{{ $pendaftar->kurikulum }}</td>
            </tr>
            <tr>
                <td class="label">Alasan Masuk Pondok</td>
                <td>{{ $pendaftar->harapan ?? '-' }}</td>
            </tr>
        </table>

        <p class="italic">
            Harap cetak formulir bukti pendaftaran ini dan bawa ke Pondok Pesantren Darur Rohmah untuk dilakukan verifikasi data.
            Untuk informasi lebih lanjut mengenai pembayaran, silakan hubungi kami melalui WhatsApp atau datang langsung ke pondok.
        </p>
    </div>

    <hr />

    <div class="footer">
        <div class="date">Buaran Mayong Jepara, {{ \Carbon\Carbon::now()->format('d / m / Y') }}</div>
        <div>
            Habib Syahir Shodiq Al Hinduan<br />
            (Pengasuh Pondok)
        </div>
    </div>
</body>
</html>