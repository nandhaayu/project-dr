<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: true }" class="h-full">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="/backend/css/styles.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/backend/summernote/summernote.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <title>PONPES DAARUR RAHMAH</title>
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
<script src="/backend/libs/jquery/dist/jquery.min.js"></script>
<script src="/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/backend/js/sidebarmenu.js"></script>
<script src="/backend/js/app.min.js"></script>
<script src="/backend/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/backend/libs/simplebar/dist/simplebar.js"></script>
<script src="/backend/js/dashboard.js"></script>
<script src="/backend/summernote/summernote.min.js"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>
</html>


{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>PONPES DAARUR RAHMAH</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.png') }}"/>
  <link rel="stylesheet" href="/backend/css/styles.min.css" />
  <link rel="stylesheet" href="/backend/summernote/summernote.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
  <!--  Body Wrapper -->
  <main>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!--  Aside Start -->
      @include('backend.components.aside')
      <!--  Aside End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        @include('backend.components.header')
        <!--  Header End -->
        <!--  Content Start -->
        @yield('content')
        <!--  Content End -->
      </div>
    </div>
  </main>
  <script src="/backend/libs/jquery/dist/jquery.min.js"></script>
  <script src="/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/backend/js/sidebarmenu.js"></script>
  <script src="/backend/js/app.min.js"></script>
  <script src="/backend/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/backend/libs/simplebar/dist/simplebar.js"></script>
  <script src="/backend/js/dashboard.js"></script>
  <script src="/backend/summernote/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
</body>

</html> --}}