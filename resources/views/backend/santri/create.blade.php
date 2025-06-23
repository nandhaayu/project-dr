@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Tambah Data Santri</h5>
      
      <form action="{{ route('santris.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik" required>
        </div>

        <div class="mb-3">
          <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>

        <div class="mb-3">
          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>

        <div class="mb-3">
          <label for="no_hp" class="form-label">No HP</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>

        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="nama_orangtua" class="form-label">Nama Orang Tua</label>
          <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua" required>
        </div>

        <div class="mb-3">
          <label for="kurikulum" class="form-label">Kurikulum</label>
          <select class="form-control" id="kurikulum" name="kurikulum" required>
            <option value="">-- Pilih --</option>
            <option value="Tahfidz">Tahfidz</option>
            <option value="Kitab Kuning">Kitab Kuning</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label for="harapan" class="form-label">Harapan</label>
          <textarea class="form-control" id="harapan" name="harapan" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label for="akte" class="form-label">Upload Akte (PDF)</label>
          <input type="file" class="form-control" id="akte" name="akte" accept="application/pdf" required>
        </div>

        <div class="mb-3">
          <label for="kk" class="form-label">Upload KK (PDF)</label>
          <input type="file" class="form-control" id="kk" name="kk" accept="application/pdf" required>
        </div>

        <div class="mb-3">
          <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
          <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('santris.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
