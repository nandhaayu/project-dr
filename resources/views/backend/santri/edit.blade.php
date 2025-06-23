@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data Santri</h5>

      <form action="{{ route('santris.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $santri->nama) }}" required>
        </div>

        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $santri->nik) }}" required>
        </div>

        <div class="mb-3">
          <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $santri->tempat_lahir) }}" required>
        </div>

        <div class="mb-3">
          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}" required>
        </div>

        <div class="mb-3">
          <label for="no_hp" class="form-label">No HP</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $santri->no_hp) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" required>
            <option value="L" {{ $santri->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $santri->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="nama_orangtua" class="form-label">Nama Orang Tua</label>
          <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua" value="{{ old('nama_orangtua', $santri->nama_orangtua) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Kurikulum</label>
          <select name="kurikulum" class="form-control" required>
            <option value="Tahfidz" {{ $santri->kurikulum == 'Tahfidz' ? 'selected' : '' }}>Tahfidz</option>
            <option value="Kitab Kuning" {{ $santri->kurikulum == 'Kitab Kuning' ? 'selected' : '' }}>Kitab Kuning</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $santri->alamat) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="harapan" class="form-label">Harapan</label>
          <textarea class="form-control" id="harapan" name="harapan" rows="3">{{ old('harapan', $santri->harapan) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="akte" class="form-label">Akte (PDF)</label>
          <input type="file" class="form-control" name="akte" accept="application/pdf">
          @if ($santri->akte)
            <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $santri->akte) }}" target="_blank">Lihat Akte</a></p>
          @endif
        </div>

        <div class="mb-3">
          <label for="kk" class="form-label">Kartu Keluarga (PDF)</label>
          <input type="file" class="form-control" name="kk" accept="application/pdf">
          @if ($santri->kk)
            <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $santri->kk) }}" target="_blank">Lihat KK</a></p>
          @endif
        </div>

        <div class="mb-3">
          <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
          <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', $santri->tanggal_masuk) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('santris.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
