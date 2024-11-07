@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Profil</h5>
      <a href="{{ route('profil.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($profil as $d)
            <tr>
              <td>{{ $d->judul }}</td>
              <td>
                @empty($d->foto)
                  <img src="{{url('assets/img/logo-PPDR.png')}}"
                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                  @else
                  <img src="{{url('assets/img/logo.png')}}/{{$d->foto}}"
                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                @endempty
              </td>
              <td>{{ $d->deskripsi }}</td>
              <td>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <form action="#" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
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