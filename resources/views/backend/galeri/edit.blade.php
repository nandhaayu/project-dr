@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data galeri</h5>
      
      <form action="{{ route('galeri.update', $id->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $id->judul }}">
          @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control mb-3" id="foto" name="foto[]" accept="image/*" multiple>
      
          <!-- Tampilkan foto lama jika ada -->
          @php
              $fotoArray = is_string($id->foto) ? json_decode($id->foto, true) : $id->foto;
          @endphp
          @if (!empty($fotoArray))
              <div class="d-flex flex-wrap gap-2">
                  @foreach ($fotoArray as $foto)
                      <div class="position-relative">
                          <img src="{{ url('storage/' . $foto) }}" class="rounded border" style="width: 100px; height: auto;">
                      </div>
                  @endforeach
              </div>
          @endif
      </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('galeri.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection


