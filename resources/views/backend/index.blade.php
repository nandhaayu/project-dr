@extends('backend.components.layouts')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <!--  Aside Start -->
  @include('backend.components.aside')
  <!--  Aside End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
    @include('backend.components.header')
    <!--  Header End -->
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
  </div>
</div>
@endsection