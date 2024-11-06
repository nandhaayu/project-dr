<header class="bg-white shadow sticky top-0 z-50" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-8xl px-4 py-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <div class="md:ml-16">
                <img id="logo" style="width: 100%; height:70px" src="assets/img/logo-PPDR.png" alt="logo">
            </div>
          </div>
        </div>
        <script>
            // Script to change logo on scroll
            window.addEventListener('scroll', function() {
                var header = document.getElementById('header');
                var logo = document.getElementById('logo');
                
                if (window.scrollY > 50) { // Check if scrolled more than 50px
                    logo.src = "assets/img/logo-YDR.png"; // Change logo to new one
                } else {
                    logo.src = "assets/img/logo-PPDR.png"; // Change back to original logo
                }
            });
        </script>
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



