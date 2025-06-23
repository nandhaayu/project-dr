@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Detail Santri</h5>

      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Nama</th>
            <td>{{ $santri->nama }}</td>
          </tr>
          <tr>
            <th>NIK</th>
            <td>{{ $santri->nik }}</td>
          </tr>
          <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}</td>
          </tr>
          <tr>
            <th>No HP</th>
            <td>{{ $santri->no_hp }}</td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
          </tr>
          <tr>
            <th>Nama Orangtua</th>
            <td>{{ $santri->nama_orangtua }}</td>
          </tr>
          <tr>
            <th>Kurikulum</th>
            <td>{{ $santri->kurikulum }}</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>{{ $santri->alamat }}</td>
          </tr>
          <tr>
            <th>Harapan</th>
            <td>{{ $santri->harapan }}</td>
          </tr>
          <tr>
            <th>Akte (PDF)</th>
            <td>
              @if($santri->akte)
              <a href="{{ asset('storage/' . $santri->akte) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Akte</a>
              @else
              Tidak ada file
              @endif
            </td>
          </tr>
          <tr>
            <th>Kartu Keluarga (PDF)</th>
            <td>
              @if($santri->kk)
              <a href="{{ asset('storage/' . $santri->kk) }}" target="_blank" class="btn btn-primary btn-sm">Lihat KK</a>
              @else
              Tidak ada file
              @endif
            </td>
          </tr>
        </tbody>
      </table>

      <a href="{{ route('santris.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
  </div>
</div>
@endsection
