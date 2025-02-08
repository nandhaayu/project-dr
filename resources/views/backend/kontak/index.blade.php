@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Kontak</h5>
        @if(!$kontak) <!-- Jika kontak tidak ada, tampilkan tombol -->
          <a href="{{ route('kontak.create') }}" class="bg-green-600 mb-2 px-2 py-2 rounded-lg text-white hover:bg-green-700">+ Tambah Data</a>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Jam Buka</th>
              {{-- <th>Link Maps</th> --}}
              <th class="w-40">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($kontak)
            <tr>
              <td>{!! $kontak->alamat !!}</td>
              <td>{!! $kontak->telepon !!}</td>
              <td>{{ $kontak->email  }}</td>
              <td>{!! $kontak->jam !!}</td>
              {{-- <td>{{ $kontak->link_maps }}</td> --}}
              <td>
                  <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $kontak->id }}">Hapus</button>
                  @include('backend.kontak.delete')
              </td>
          </tr>
            @else
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
