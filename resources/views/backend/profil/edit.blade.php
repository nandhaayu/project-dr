@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data Profil</h5>
      
      <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $profil->judul) }}">
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" name="deskripsi" rows="4">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
          @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control mb-3" id="foto" name="foto" accept="image/*">
          @if($profil->foto && $profil->foto !== 'nophoto.jpg')
            <img loading="lazy" src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Profil" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
          @endif 
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('profil.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
