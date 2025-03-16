<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>PONPES DARUR ROHMAH</title>
    <link rel="icon" href="{{ asset('assets/img/logo-PPDR.png') }}" type="image/png" />
    <link href="{{ asset('assets/css/fontawesome/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/fontawesome/css/brands.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/fontawesome/css/solid.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
