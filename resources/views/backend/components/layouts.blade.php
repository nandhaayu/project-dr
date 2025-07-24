<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: true }" class="h-full">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preload" href="https://rsms.me/inter/inter.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://rsms.me/inter/inter.css"></noscript>
  <link rel="icon" href="{{ asset('assets/img/logo-PPDR.png') }}" type="image/png" />
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="{{ asset('backend/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <title>PONPES DARUR ROHMAH</title>
</head>

<body class="h-full flex">
  <!-- Sidebar -->
  @include('backend.components.aside')
  <!-- Main Content -->
  <div class="flex-1 flex flex-col transition-all duration-300">
    <!-- Header -->
    @include('backend.components.header')
    <!-- Content -->
    <main class="p-4">
      @yield('content')
    </main>
  </div>
</body>
<script defer  src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
<script defer  src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script defer  src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
<script defer  src="{{ asset('backend/js/app.min.js') }}"></script>
<script defer  src="{{ asset('backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script defer  src="{{ asset('backend/libs/simplebar/dist/simplebar.js') }}"></script>
<script defer  src="{{ asset('backend/js/dashboard.js') }}"></script>
<script defer  src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>

</html>
