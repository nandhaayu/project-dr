@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data kontak</h5>
      
      <form action="{{ route('kontak.update', $id->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="alamat" class="form-label">alamat</label>
          <textarea class="form-control @error('alamat') is-invalid @enderror" id="summernote" name="alamat" rows="4" value="{{ $id->alamat }}">{{ $id->alamat }}</textarea>
          @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">telepon</label>
          <textarea class="form-control @error('telepon') is-invalid @enderror" id="summernote" name="telepon" rows="4" value="{{ $id->telepon }}">{{ $id->telepon }}</textarea>
          @error('telepon')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $id->email }}">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="jam" class="form-label">jam</label>
          <textarea class="form-control @error('jam') is-invalid @enderror" id="summernote" name="jam" rows="4" value="{{ $id->jam }}">{{ $id->jam }}</textarea>
          @error('jam')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="link_maps" class="form-label">Link Maps</label>
          <input type="link_maps" class="form-control @error('link_maps') is-invalid @enderror" id="link_maps" name="link_maps" value="{{ $id->link_maps }}">
          @error('link_maps')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kontak.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection


