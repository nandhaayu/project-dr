@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data Pendaftaran</h5>
      
      <form action="{{ route('pendaftaran.update', $id->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <!-- Input Judul -->
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $id->judul) }}">
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <!-- Input Deskripsi -->
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" name="deskripsi" rows="4">{{ old('deskripsi', $id->deskripsi) }}</textarea>
          @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <!-- Input File -->
        <div class="mb-3">
          <label for="file" class="form-label">File</label>
          <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
          @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          @if ($id->file)
            <small class="form-text text-muted">File yang diunggah: <a href="{{ url('assets/files/'.$id->file) }}" target="_blank">{{ $id->file }}</a></small>
          @endif
        </div>

        <!-- Input Foto -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control mb-3 @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
            @error('foto')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if(!empty($id->foto))
              <div class="mt-2">
                <img src="{{ url('storage/'.$id->foto) }}" alt="Foto Pendaftaran" class="rounded" style="width: 100px; height: auto;">
              </div>
            @else
              <small class="form-text text-muted">Tidak ada foto sebelumnya.</small>
            @endif
        </div>

        <!-- Button Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pendaftaran.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
