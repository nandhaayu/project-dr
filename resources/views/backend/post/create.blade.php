@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data Artikel</h5>
      
      <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan title" required>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="summernote" name="body" rows="4" placeholder="Masukkan body" required></textarea>
          @error('body')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('post.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection


