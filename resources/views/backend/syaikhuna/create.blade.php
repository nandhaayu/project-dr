@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data Syaikhuna</h5>
      
      <form action="{{ route('syaikhuna.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul" required>
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama" required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" name="deskripsi" rows="4" placeholder="Masukkan deskripsi" required></textarea>
          @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" required>
            @error('foto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('syaikhuna.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
