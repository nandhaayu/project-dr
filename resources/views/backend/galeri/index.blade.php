@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Galeri</h5>
      <a href="{{ route('galeri.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">
        + Tambah Data
      </a>
      <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Gambar</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($galeri->isNotEmpty())
              @foreach ($galeri as $d)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->judul }}</td>
                <td>
                  @php
                    $imagePath = asset('assets/images/' . $d->foto);
                    if (!file_exists(public_path('assets/images/' . $d->foto))) {
                        $imagePath = asset('assets/images/nophoto.jpg'); // Gambar default jika tidak ditemukan
                    }
                  @endphp
                  <img src="{{ $imagePath }}" alt="Galeri Image" class="rounded" style="width: 100px; height: auto;">
                </td>
                <td>
                  <a href="{{ route('galeri.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Hapus</button>
                  @include('backend.galeri.delete')
                </td>
              </tr>
              @endforeach
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
