@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data Artikel</h5>
      
      <form action="{{ route('post.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <!-- Menyembunyikan input author_id, menggunakan ID dari user yang sedang login -->
        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">

        <!-- Input Title -->
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $id->title) }}" required>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Input Body (Deskripsi) -->
        <div class="mb-3">
          <label for="body" class="form-label">Deskripsi</label>
          <textarea class="form-control @error('body') is-invalid @enderror" id="summernote" name="body" rows="4">{{ old('body', $id->body) }}</textarea>
          @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Input Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="file" class="form-control mb-3" id="image" name="image" accept="image/*">
            @if(!empty($id->image))
              <img src="{{ url('storage/'.$id->image) }}" alt="Current Image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
            @endif 
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('post.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

@endsection


