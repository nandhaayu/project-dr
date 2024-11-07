@extends('backend.components.layouts')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Dashboard</h5>
      @if (Auth::check())
      <p class="mb-0 text-green-700">Selamat Datang di Dashboard {{ Auth::user()->name }}</p>
      @endif
    </div>
  </div>
</div>
@endsection