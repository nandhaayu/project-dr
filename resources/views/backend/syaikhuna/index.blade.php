@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Syaikhuna</h5>
      <a href="{{ route('syaikhuna.create') }}" class="bg-green-600 mb-2 px-4 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($syaikhuna as $d)
            <tr>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->nama }}</td>
                <td>
                    <img src="{{ asset('storage/' . $d->foto) }}" alt="Foto {{ $d->judul }}" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                </td>
                <td>{!! $d->deskripsi !!}</td>
                <td>
                    <a href="{{ route('syaikhuna.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Hapus</button>
                    @include('backend.syaikhuna.delete')
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
