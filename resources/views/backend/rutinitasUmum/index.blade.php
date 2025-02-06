@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Rutinitas Kegiatan Umum</h5>
        <a href="{{ route('rutinitas.umum.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
        <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($rutinitas as $d)
              <tr>
                <td>{{ $d->judul }}</td>
                <td>{!! $d->deskripsi !!}</td>
                <td>
                    <a href="{{ route('rutinitas.umum.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Hapus</button>
                    @include('backend.rutinitasUmum.delete')
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
