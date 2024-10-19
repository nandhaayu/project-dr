<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>PDR</title>
    <link href="assets/css/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="assets/css/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="assets/css/fontawesome/css/solid.css" rel="stylesheet" />
</head>
<body class="h-full">

  <x-navbar></x-navbar>
  <x-header></x-header>

  <main>
    <div class="bg-gray-100">
      {{ $slot }}
    </div>
  </main>

  <x-footer></x-footer>
  
</body>
</html>