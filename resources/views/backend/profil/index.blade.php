@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Profil</h5>

      @if(!$profil) <!-- Jika profil tidak ada, tampilkan tombol tambah data -->
        <a href="{{ route('profil.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($profil)
            <tr>
              <td>{{ $profil->judul }}</td>
              <td>
                <img src="{{ asset('storage/' . $profil->foto) }}" alt="Profil Foto" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
              </td>
              <td>{!! $profil->deskripsi !!}</td>
              <td>
                <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $profil->id }}">Hapus</button>
                @include('backend.profil.delete')
              </td>
            </tr>
            @else
            <tr>
              <td colspan="4" class="text-center">Data tidak ditemukan</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
