@extends('backend.components.layouts')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Edit Data slide</h5>
      
      <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control mb-3" id="foto" name="foto" accept="image/*">
          @if($slide->foto && $slide->foto !== 'nophoto.jpg')
            <img src="{{ asset('storage/' . $slide->foto) }}" alt="Foto slide" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
          @endif 
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('slide.admin') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
