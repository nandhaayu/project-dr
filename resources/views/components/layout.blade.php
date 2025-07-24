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
    <link rel="stylesheet" href="{{ asset('assets/css/marquee.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo-PPDR.png') }}" type="image/png" />
    <link rel="preload" as="image" href="{{ asset('assets/img/logo-PPDR.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="grid min-h-screen grid-rows-[auto_1fr_auto] bg-gray-100">

  <x-navbar></x-navbar>
  <x-header></x-header>

  <main>
    <div class="bg-gray-100">
      {{ $slot }}
    </div>
  </main>

  <x-footer></x-footer>
  
</body>
<script src="{{ asset('assets/js/slider.js') }}" defer></script>
</html>
