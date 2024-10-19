<header class="bg-white shadow sticky top-0 z-50" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-8xl px-4 py-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            {{-- <h1 class="text-3xl font-bold tracking-tight text-white">PDR</h1> --}}
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
              <div class="relative group">
                <x-nav-link href="#" :active="request()->is('kami')">Tentang Kami</x-nav-link>
                <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 py-2 w-64">
                    <a href="/profil" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300">Profil</a>
                    <a href="/kurikulum" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300">Kurikulum (Tahfidz & Kitab)</a>
                    <a href="/rutinitas" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300">Rutinitas (Jadwal Kegiatan)</a>
                </div>
              </div>            
              <x-nav-link href="/syaikhuna" :active="request()->is('syaikhuna')">Syaikhuna</x-nav-link>
              <x-nav-link href="/pendaftaran" :active="request()->is('pendaftaran')">Pendaftaran</x-nav-link>
              <x-nav-link href="/galeri" :active="request()->is('galeri')">Galeri</x-nav-link>
              <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-green-800 p-2 text-green-400 hover:bg-green-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen,'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen,'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="isOpen" class="md:hidden" id="mobile-menu">
          <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
              <a href="/" class="block rounded-md {{ request()->is('/') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium"">Beranda</a>
              {{-- <a href="/kami" class="block rounded-md {{ request()->is('kami') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium">Kami</a> --}}
              <div x-data="{ openSubMenu: false }" class="relative">
                <button @click="openSubMenu = !openSubMenu" class="w-full flex rounded-md px-3 py-2 text-base font-medium {{ Request::is('/profil') ? 'bg-green-700 text-white' : 'bg-green-300 hover:bg-green-700 hover:text-white' }}">
                    Tentang Kami
                    <!-- Icon for dropdown -->
                    <svg class="inline-block h-5 w-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
    
                <!-- Sub-menu items -->
                <div x-show="openSubMenu" @click.away="openSubMenu = false" class="mt-2 space-y-1 bg-green-200 rounded-md shadow-lg">
                    <a href="/profil" class="block px-3 py-2 text-base font-medium {{ Request::is('profil') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Profil</a>
                    <a href="/kurikulum" class="block px-3 py-2 text-base font-medium {{ Request::is('kurikulum') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Kurikulum (Tahfidz & Kitab)</a>
                    <a href="/rutinitas" class="block px-3 py-2 text-base font-medium {{ Request::is('rutinitas') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Rutinitas (Jadwal Kegiatan)</a>
                </div>
              </div>
              <a href="/syaikhuna" class="block rounded-md {{ request()->is('syaikhuna') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium">Syaikhuna</a>
              <a href="/pendaftaran" class="block rounded-md {{ request()->is('pendaftaran') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium">Pendaftaran</a>
              <a href="/galeri" class="block rounded-md {{ request()->is('galeri') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium">Galeri</a>
              <a href="/kontak" class="block rounded-md {{ request()->is('kontak') ? 'bg-green-700' : 'bg-green-300' }} hover:bg-green-700 hover:text-white px-3 py-2 text-base font-medium">Kontak</a>
          </div>
      </div>

    </div>
</header>

{{-- <header class="header-area header-sticky" x-data="{ isOpen: false }">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <h1>Ponpes</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                        <ul class="nav flex space-x-4">
                            <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
                            <li class="relative group">
                                <a href="#" class="{{ Request::is('tentang-kami*') ? 'active' : '' }}">Tentang Kami</a>
                                <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 py-2 w-64">
                                    <a href="/profil" class="{{ Request::is('profil') ? 'active' : '' }} block px-3 py-2 text-sm text-green-700 hover:bg-green-100">Profil</a>
                                    <a href="/kurikulum" class="{{ Request::is('kurikulum') ? 'active' : '' }} block px-3 py-2 text-sm text-green-700 hover:bg-green-100">Kurikulum (Tahfidz & Kitab)</a>
                                    <a href="/rutinitas" class="{{ Request::is('rutinitas') ? 'active' : '' }} block px-3 py-2 text-sm text-green-700 hover:bg-green-100">Rutinitas (Jadwal Kegiatan)</a>
                                </div>
                            </li>
                            <li><a href="/syaikhuna" class="{{ Request::is('syaikhuna') ? 'active' : '' }}">Syaikhuna</a></li>
                            <li><a href="/pendaftaran" class="{{ Request::is('pendaftaran') ? 'active' : '' }}">Pendaftaran</a></li>
                            <li><a href="/galeri" class="{{ Request::is('galeri') ? 'active' : '' }}">Galeri</a></li>
                            <li><a href="/kontak" class="{{ Request::is('kontak') ? 'active' : '' }}"><i class="fa fa-phone"></i>Kontak</a></li>
                        </ul>
                    <!-- Mobile menu button -->
                    <div class="flex md:hidden items-center ml-auto mt-3"> <!-- Tambahkan ml-auto untuk memindahkan tombol ke kanan -->
                        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-green-700 p-2 text-green-400 hover:bg-green-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg :class="{'hidden': isOpen,'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg :class="{'block': isOpen,'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3 bg-green-700">
            <a href="/" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('/') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}" aria-current="page">Beranda</a>
    
            <!-- Menu Kami with Sub-menu -->
            <div x-data="{ openSubMenu: false }" class="relative">
                <button @click="openSubMenu = !openSubMenu" class="w-full flex justify-center items-center rounded-md px-3 py-2 text-base font-medium {{ Request::is('profil*') ? 'bg-green-900 text-white' : 'text-green-500 hover:bg-green-700 hover:text-white' }}">
                    Kami
                    <!-- Icon for dropdown -->
                    <svg class="inline-block h-5 w-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
    
                <!-- Sub-menu items -->
                <div x-show="openSubMenu" @click.away="openSubMenu = false" class="mt-2 space-y-1 bg-green-800 rounded-md shadow-lg">
                    <a href="/profil" class="block px-3 py-2 text-base font-medium {{ Request::is('profil') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Profil</a>
                    <a href="/visi-misi" class="block px-3 py-2 text-base font-medium {{ Request::is('visi-misi') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Visi & Misi</a>
                    <a href="/struktur" class="block px-3 py-2 text-base font-medium {{ Request::is('struktur') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Struktur Organisasi</a>
                </div>
            </div>
    
            <a href="/syaikhuna" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('syaikhuna') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Syaikhuna</a>
            <a href="/pendaftaran" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('pendaftaran') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Pendaftaran</a>
            <a href="/galeri" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('galeri') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Galeri</a>
            <a href="/kontak" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('kontak') ? 'bg-green-700 text-white' : 'text-green-500 hover:bg-green-900 hover:text-white' }}">Kontak</a>
        </div>
    </div>    
</header> --}}


