<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>PONPES DAARUR RAHMAH</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/logo-PPDR.png" />
  <link rel="stylesheet" href="backend/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <main>
    @yield('content')
  </main>
  <script src="backend/libs/jquery/dist/jquery.min.js"></script>
  <script src="backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="backend/js/sidebarmenu.js"></script>
  <script src="/backend/js/app.min.js"></script>
  <script src="/backend/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/backend/libs/simplebar/dist/simplebar.js"></script>
  <script src="/backend/js/dashboard.js"></script>
</body>

</html>