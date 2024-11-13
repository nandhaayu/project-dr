@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data kontak</h5>
      
      <form action="{{ route('kontak.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="alamat" class="form-label">alamat</label>
          <textarea class="form-control" id="summernote" name="alamat" rows="4" placeholder="Masukkan alamat" required></textarea>
          @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="telepon" class="form-label">telepon</label>
          <textarea class="form-control" id="summernote" name="telepon" rows="4" placeholder="Masukkan telepon" required></textarea>
          @error('telepon')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="jam" class="form-label">Jam Operasional</label>
          <textarea class="form-control" id="summernote" name="jam" rows="4" placeholder="Masukkan jam" required></textarea>
          @error('jam')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="link_maps" class="form-label">Link Maps</label>
          <input type="link_maps" class="form-control" id="link_maps" name="link_maps" placeholder="Masukkan link_maps" required>
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


