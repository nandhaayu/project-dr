@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data Profil</h5>
      
      <form action="#" method="POST">
        @csrf
        <div class="mb-3">
          <label for="judl" class="form-label">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
        </div>
        
        <div class="mb-3">
          <label for="deskripsi" class="form-label">deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi" required></textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="#" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
