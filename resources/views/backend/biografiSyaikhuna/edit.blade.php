@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data Biografi Syaikhuna</h5>
      
      <form action="{{ route('biografi.syaikhuna.update', $syaikhuna->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <!-- Input Judul -->
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $syaikhuna->judul }}">
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <!-- Input Deskripsi -->
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" name="deskripsi" rows="4">{{ $syaikhuna->deskripsi }}</textarea>
          @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Input Foto -->
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control mb-3" id="foto" name="foto" accept="image/*">
          @if(!empty($syaikhuna->foto))
            <img src="{{ url('assets/images/' . $syaikhuna->foto) }}" alt="Foto Syaikhuna" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
          @endif
        </div>

        <!-- Tombol Submit dan Batal -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('biografi.syaikhuna.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
