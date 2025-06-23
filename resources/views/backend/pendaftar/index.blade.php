@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Data Pendaftar</h5>
      <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>No HP</th>
              <th>Jenis Kelamin</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($pendaftars->isNotEmpty())
              @foreach ($pendaftars as $pendaftar)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pendaftar->nama }}</td>
                <td>{{ $pendaftar->nik }}</td>
                <td>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $pendaftar->no_hp }}</td>
                <td>{{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>
                  @if($pendaftar->status == 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                  @elseif($pendaftar->status == 'acc')
                    <span class="badge bg-success">Acc</span>
                  @elseif($pendaftar->status == 'tolak')
                    <span class="badge bg-danger">Ditolak</span>
                  @else
                    <span class="badge bg-secondary">Tidak Diketahui</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex flex-wrap gap-1">
                    <a href="{{ route('pendaftars.show', $pendaftar->id) }}" class="btn btn-info btn-sm">
                      <i class="fa-solid fa-eye"></i> Detail
                    </a>

                    @if($pendaftar->status == 'pending')
                      <form action="{{ route('pendaftars.acc', $pendaftar->id) }}" method="POST" onsubmit="return confirm('Yakin ACC pendaftar ini?')">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                          <i class="fa-solid fa-check"></i> ACC
                        </button>
                      </form>

                      <form action="{{ route('pendaftars.tolak', $pendaftar->id) }}" method="POST" onsubmit="return confirm('Yakin tolak pendaftar ini?')">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fa-solid fa-xmark"></i> Tolak
                        </button>
                      </form>
                    @else
                      <button class="btn btn-secondary btn-sm" disabled>
                        <i class="fa-solid fa-circle-check"></i> Sudah Diproses
                      </button>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            @else
              <tr>
                <td colspan="8" class="text-center">Data tidak ditemukan</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
