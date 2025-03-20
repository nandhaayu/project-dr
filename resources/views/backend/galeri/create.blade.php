@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data Galeri</h5>
      
      <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judl" class="form-label">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            @error('foto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto[]" accept="image/*" multiple>
          @error('foto')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>       

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('galeri.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection


