@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Syaikhuna</h5>
        @if(!$syaikhuna) <!-- Jika syaikhuna tidak ada, tampilkan tombol -->
          <a href="{{ route('syaikhuna.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($syaikhuna)
            <tr>
              <td>{{ $syaikhuna->judul }}</td>
              <td>{{ $syaikhuna->nama }}</td>
              <td><img src="{{ asset('storage/' . $syaikhuna->foto) }}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;"></td>
              <td>{{ $syaikhuna->nama_1 }}</td>
              <td><img src="{{ asset('storage/' . $syaikhuna->foto_1) }}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;"></td>
              <td>{!! $syaikhuna->deskripsi !!}</td>
              <td>
                  <a href="{{ route('syaikhuna.edit', $syaikhuna->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $syaikhuna->id }}">Hapus</button>
                  @include('backend.syaikhuna.delete')
              </td>
          </tr>
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
