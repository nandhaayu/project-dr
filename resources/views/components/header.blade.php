<header class="bg-white shadow sticky top-0 z-50" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-8xl px-4 py-4 sm:px-6 lg:px-4">
      <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
              <div class="flex-shrink-0">
                  <div class="md:ml-16">
                      <img id="logo" class="h-12 w-auto max-w-xs" src="{{ asset('assets/img/logo-PPDR.png') }}" alt="logo">
                  </div>
              </div>
          </div>

          <script>
              window.addEventListener('scroll', function() {
                  var logo = document.getElementById('logo');
                  logo.src = window.scrollY > 50 ? "{{ asset('assets/img/logo-YDR.png') }}" : "{{ asset('assets/img/logo-PPDR.png') }}";
              });
          </script>

          <div class="hidden md:block">
              <div class="ml-4 flex items-center md:ml-6">
                  <div class="ml-10 flex items-baseline space-x-4">
                    <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>

                    <!-- Dropdown Tentang Kami -->
                    <div class="relative group">
                        <x-nav-link href="#" :active="request()->is('profil') || request()->is('kurikulum') || request()->is('rutinitas') || request()->is('rutinitasUmum')">
                            Tentang Kami <i class="fa-solid fa-caret-down ml-1"></i>
                        </x-nav-link>
                        <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 py-2 w-64">
                            <a href="/profil" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300 {{ request()->is('profil') ? 'bg-green-300' : '' }}">Profil</a>
                            <a href="/kurikulum" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300 {{ request()->is('kurikulum') ? 'bg-green-300' : '' }}">Kurikulum</a>
                            <a href="/rutinitas" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300 {{ request()->is('rutinitas') ? 'bg-green-300' : '' }}">Rutinitas Santri</a>
                            <a href="/rutinitasUmum" class="block px-4 py-2 text-sm font-semibold text-black hover:bg-green-300 {{ request()->is('rutinitasUmum') ? 'bg-green-300' : '' }}">Rutinitas Umum</a>
                        </div>
                        </div>

                        <x-nav-link href="/syaikhuna" :active="request()->is('syaikhuna')">Syaikhuna</x-nav-link>
                        <x-nav-link href="/pendaftaran" :active="request()->is('pendaftaran')">Pendaftaran</x-nav-link>
                        <x-nav-link href="/galeri" :active="request()->is('galeri')">Galeri</x-nav-link>
                        <x-nav-link href="/artikel" :active="request()->is('artikel') || request()->is('artikel/*')">Artikel</x-nav-link>
                        <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>
                  </div>
              </div>
          </div>

          <!-- Tombol Menu Mobile -->
          <div class="-mr-2 flex md:hidden">
              <button @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-green-800 p-2 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                  <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                  <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>
              </button>
          </div>
      </div>

      <!-- Mobile Menu -->
      <div x-show="isOpen" class="md:hidden fixed top-16 left-0 w-full bg-white shadow-lg transition-all duration-300">
          <div class="space-y-1 px-4 py-4">
            <!-- Beranda -->
            <a href="/" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('/') ? 'bg-green-700 text-white' : '' }}">Beranda</a>

            <!-- Dropdown Tentang Kami -->
            <div x-data="{ openSubMenu: {{ request()->is('profil') || request()->is('kurikulum') || request()->is('rutinitas') || request()->is('rutinitasUmum') ? 'true' : 'false' }} }">
              <button @click="openSubMenu = !openSubMenu" 
                class="w-full flex justify-between rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white 
                    {{ request()->is('profil') || request()->is('kurikulum') || request()->is('rutinitas') || request()->is('rutinitasUmum') ? 'bg-green-700 text-white' : 'bg-white text-black' }}">
                Tentang Kami <i class="fa-solid fa-caret-down ml-1 py-1"></i>
              </button>          

                <!-- Sub-menu items -->
                <div x-show="openSubMenu" class="overflow-hidden transition-all duration-300">
                    <a href="/profil" class="block px-3 py-2 text-base font-medium {{ request()->is('profil') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Profil</a>
                    <a href="/kurikulum" class="block px-3 py-2 text-base font-medium {{ request()->is('kurikulum') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Kurikulum</a>
                    <a href="/rutinitas" class="block px-3 py-2 text-base font-medium {{ request()->is('rutinitas') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Rutinitas Santri</a>
                    <a href="/rutinitasUmum" class="block px-3 py-2 text-base font-medium {{ request()->is('rutinitasUmum') ? 'bg-green-800 text-white' : 'text-green-700 hover:bg-green-900 hover:text-white' }}">Rutinitas Umum</a>
                </div>
            </div>

            <!-- Menu Lainnya -->
            <a href="/syaikhuna" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('syaikhuna') ? 'bg-green-700 text-white' : '' }}">Syaikhuna</a>
            <a href="/pendaftaran" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('pendaftaran') ? 'bg-green-700 text-white' : '' }}">Pendaftaran</a>
            <a href="/galeri" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('galeri') ? 'bg-green-700 text-white' : '' }}">Galeri</a>
            <a href="/artikel" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('artikel') || request()->is('artikel/*') ? 'bg-green-700 text-white' : '' }}">Artikel</a>
            <a href="/kontak" class="block rounded-md px-3 py-2 text-base font-medium hover:bg-green-700 hover:text-white {{ request()->is('kontak') ? 'bg-green-700 text-white' : '' }}">Kontak</a>
          </div>
      </div>
  </div>
</header>
