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
  <aside :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'" class="bg-white text-black h-full transition-all duration-300 flex flex-col">
    <div class="flex items-center justify-between px-4 py-3">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-10">
        <span x-show="sidebarOpen" class="text-xl font-bold text-green-700">PONPES-DR</span>
      </div>
    </div>
    <nav class="flex-1 px-4 scroll-sidebar list-none space-y-3">
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('dashboard') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-bars mr-2"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('slide.admin') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-sliders mr-2"></i>
            </span>
            <span class="hide-menu">Slide</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('beranda.admin') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-house-chimney mr-2"></i>
            </span>
            <span class="hide-menu">Beranda</span>
        </a>
    </li>
    <li class="sidebar-item group">
        <a class="sidebar-link hover:text-green-700 flex items-center justify-between" href="#" aria-expanded="false">
            <span class="flex items-center">
                <i class="fa-regular fa-id-card mr-2"></i>
                <span class="hide-menu">Tentang Kami</span>
            </span>
            <i class="ti ti-chevron-down transition-transform duration-300 group-hover:rotate-180"></i>
        </a>
        <!-- Dropdown Sub-Menu -->
        <ul class="sidebar-submenu hidden group-hover:block ml-6 mt-2 space-y-2">
            <li>
                <a href="{{ route('profil.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                    Profil
                </a>
            </li>
            <li>
                <a href="{{ route('kurikulum.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                    Kurikulum
                </a>
            </li>
            <li>
                <a href="{{ route('rutinitas.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                    Rutinitas Kegiatan Santri
                </a>
            </li>
            <li>
                <a href="{{ route('rutinitas.umum.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                    Rutinitas Kegiatan Umum
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item group">
      <a class="sidebar-link flex items-center justify-between" href="#" aria-expanded="false">
          <span class="flex items-center">
              <i class="fa-regular fa-id-card"></i>
              <span class="hide-menu ml-2">Syaikhuna</span>
          </span>
          <i class="ti ti-chevron-down transition-transform duration-300 group-hover:rotate-180"></i>
      </a>
  
      <!-- Dropdown Sub-Menu -->
      <ul class="sidebar-submenu hidden group-hover:block ml-6 mt-2 space-y-2">
          <li>
              <a href="{{ route('syaikhuna.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                  Syaikhuna
              </a>
          </li>
          <li>
              <a href="{{ route('biografi.syaikhuna.admin') }}" class="sidebar-link text-sm text-gray-600 hover:text-green-700">
                  Biografi Syaikhuna
              </a>
          </li>
      </ul>
    </li> 
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('pendaftaran.admin') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-clipboard mr-2"></i>
            </span>
            <span class="hide-menu">Pendaftaran</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('post.admin') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-images mr-2"></i>
            </span>
            <span class="hide-menu">Galeri</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link hover:text-green-700" href="{{ route('kontak.admin') }}" aria-expanded="false">
            <span>
                <i class="fa-solid fa-phone mr-2"></i>
            </span>
            <span class="hide-menu">Kontak</span>
        </a>
    </li>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col transition-all duration-300">
    <!-- Header -->
    <header class="bg-white  px-4 py-6 flex justify-between items-center">
      <button @click="sidebarOpen = !sidebarOpen" class="text-black text-2xl focus:outline-none">
        &#9776;
      </button>
      <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/backend/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
        <div class="message-body">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-50 border-2 rounded-2xl border-green-700 text-green-700 hover:bg-green-700 hover:text-white mx-5 mt-2 d-block px-2">Logout</button>
          </form>
        </div>
      </div>
    </header>
    
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