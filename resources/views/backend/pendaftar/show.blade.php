@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Detail Data Pendaftar</h5>
      <a href="{{ route('pendaftars.index') }}" class="btn btn-secondary mb-3">Kembali</a>

      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pendaftar->nama }}</td>
          </tr>
          <tr>
            <th>NIK</th>
            <td>{{ $pendaftar->nik }}</td>
          </tr>
          <tr>
            <th>Tempat Lahir</th>
            <td>{{ $pendaftar->tempat_lahir }}</td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td>{{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</td>
          </tr>
          <tr>
            <th>No HP</th>
            <td><a href="https://wa.me/{{ $pendaftar->no_hp }}" class="btn btn-primary btn-sm">{{ $pendaftar->no_hp }}</a></td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
          </tr>
          <tr>
            <th>Nama Orangtua</th>
            <td>{{ $pendaftar->nama_orangtua }}</td>
          </tr>
          <tr>
            <th>Kurikulum</th>
            <td>{{ $pendaftar->kurikulum }}</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>{{ $pendaftar->alamat }}</td>
          </tr>
          <tr>
            <th>Harapan</th>
            <td>{{ $pendaftar->harapan ?? '-' }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>
              @if($pendaftar->status == 'pending')
                <span class="badge bg-warning text-dark">Pending</span>
              @elseif($pendaftar->status == 'approved')
                <span class="badge bg-success">Approved</span>
              @endif
            </td>
          </tr>
          <tr>
            <th>Akte Kelahiran</th>
            <td>
              @if($pendaftar->akte)
              <a href="{{ asset('storage/' . $pendaftar->akte) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Akte (PDF)</a>
              @else
              -
              @endif
            </td>
          </tr>
          <tr>
            <th>Kartu Keluarga</th>
            <td>
              @if($pendaftar->kk)
              <a href="{{ asset('storage/' . $pendaftar->kk) }}" target="_blank" class="btn btn-primary btn-sm">Lihat KK (PDF)</a>
              @else
              -
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
