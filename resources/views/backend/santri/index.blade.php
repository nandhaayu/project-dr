@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title fw-semibold">Data Santri</h5>
        <div>
        <a href="{{ route('santris.export.excel') }}" class="btn btn-success btn-sm"><i class="fa-solid fa-file-excel mr-2"></i>Excel</a>
        <a href="{{ route('santris.export.pdf') }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf mr-2"></i>PDF</a>
        <a href="{{ route('santris.create') }}" class="btn btn-primary btn-sm">+ Tambah Santri</a>
        </div>
      </div>
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
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($santris->isNotEmpty())
              @foreach ($santris as $santri)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $santri->nama }}</td>
                <td>{{ $santri->nik }}</td>
                <td>{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $santri->no_hp }}</td>
                <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="{{ route('santris.show', $santri->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('santris.edit', $santri->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('santris.destroy', $santri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            @else
              <tr>
                <td colspan="7" class="text-center">Data tidak ditemukan</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
