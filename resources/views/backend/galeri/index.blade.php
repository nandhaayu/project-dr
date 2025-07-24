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
                      // Pastikan foto berupa array, jika masih string maka ubah ke array
                      $fotos = is_array($d->foto) ? $d->foto : json_decode($d->foto, true);
                  @endphp
                  
                  <div class="d-flex flex-wrap gap-2">
                      @foreach ($fotos as $foto)
                          <img loading="lazy" src="{{ asset('storage/' . $foto) }}" alt="project-image" class="rounded" style="width: 100px; height: auto;">
                      @endforeach
                  </div>
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
      <!-- Pagination -->
      <div class="mt-4 flex justify-center">
        {{ $galeri->links('pagination::tailwind') }}
      </div>
    </div>
  </div>
</div>
@endsection
