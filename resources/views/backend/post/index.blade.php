@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Artikel</h5>
          <a href="{{ route('post.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
        <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Author Id</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($post as $d)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->title }}</td>
                <td>{{ $d->author->name}}</td>
                <td>{!! $d->body !!}</td>
                <td><img src="{{ asset('storage/' . $d->image) }}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;"></td>
                <td>
                    <a href="{{ route('post.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Hapus</button>
                    @include('backend.post.delete')
                </td>
              @endforeach
          </tr>
          </tbody>
        </table>
      </div>
      <!-- Pagination -->
      <div class="mt-4 flex justify-center">
        {{ $post->links('pagination::tailwind') }}
      </div>
    </div>
  </div>
</div>
@endsection
