@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data beranda</h5>
      
      <form action="{{ route('beranda.update', $beranda->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
          <label for="link" class="form-label">link</label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $beranda->link) }}">
          @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control mb-3" id="foto" name="foto" accept="image/*">
          @if($beranda->foto && $beranda->foto !== 'nophoto.jpg')
            <img src="{{ asset('storage/' . $beranda->foto) }}" alt="Foto beranda" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
          @endif 
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('beranda.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
