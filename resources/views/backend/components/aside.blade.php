<aside :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'" 
       class="bg-white text-black h-full transition-all duration-300 flex flex-col overflow-x-hidden">
  
  <!-- Logo -->
  <div class="flex items-center justify-between px-4 py-3">
    <div class="flex items-center space-x-2">
      <img loading="lazy" src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-10">
      <span x-show="sidebarOpen" class="text-xl font-bold text-green-700">PONPES-DR</span>
    </div>
  </div>

  <!-- Navigasi -->
  <nav class="flex-1 px-4 list-none space-y-3 scroll-sidebar">
    <ul class="space-y-2">

      <!-- Home -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li>

      <!-- Dashboard -->
      <li>
        <a class="sidebar-link hover:text-green-700 {{ Request::is('dashboard') ? 'text-green-700 font-bold' : '' }}" href="{{ route('dashboard') }}">
          <i class="fa-solid fa-bars mr-2"></i>
          Dashboard
        </a>
      </li>

      <!-- Slide -->
      <li>
        <a class="sidebar-link hover:text-green-700 {{ Request::is('slideAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('slide.admin') }}">
          <i class="fa-solid fa-sliders mr-2"></i>
          Slide
        </a>
      </li>

      <!-- Pendaftar -->
      <li>
        <a class="sidebar-link hover:text-green-700 {{ Request::is('pendaftars') ? 'text-green-700 font-bold' : '' }}" href="{{ route('pendaftars.index') }}">
          <i class="fa-solid fa-user-plus mr-2"></i>
          Pendaftar
        </a>
      </li>

      <!-- Santri -->
      <li>
        <a class="sidebar-link hover:text-green-700 {{ Request::is('santris') ? 'text-green-700 font-bold' : '' }}" href="{{ route('santris.index') }}">
          <i class="fa-solid fa-users mr-2"></i>
          Santri
        </a>
      </li>

      <!-- Beranda -->
      <li>
        <a class="sidebar-link hover:text-green-700 {{ Request::is('berandaAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('beranda.admin') }}">
          <i class="fa-solid fa-house-chimney mr-2"></i>
          Beranda
        </a>
      </li>

      <!-- Tentang Kami Dropdown -->
      <li class="group relative">
        <button class="sidebar-link w-full flex items-center justify-between hover:text-green-700 
                       {{ Request::is('profilAdmin', 'kurikulumAdmin', 'rutinitasAdmin', 'rutinitasUmumAdmin') ? 'text-green-700 font-bold' : '' }}">
          <span class="flex items-center">
            <i class="fa-solid fa-landmark mr-2"></i>
            Tentang Kami
          </span>
          <i class="ti ti-chevron-down transition-transform duration-300 group-hover:rotate-180"></i>
        </button>
        <ul class="sidebar-submenu absolute hidden group-hover:block bg-white shadow-md rounded-md ml-2 mt-2 space-y-2 z-40 w-48">
          <li>
            <a href="{{ route('profil.admin') }}" class="sidebar-link block px-4 py-2 text-sm hover:text-green-700 
              {{ Request::is('profilAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
              Profil
            </a>
          </li>
          <li>
            <a href="{{ route('kurikulum.admin') }}" class="sidebar-link block px-4 py-2 text-sm hover:text-green-700 
              {{ Request::is('kurikulumAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
              Kurikulum
            </a>
          </li>
          <li>
            <a href="{{ route('rutinitas.admin') }}" class="sidebar-link block px-4 py-2 text-sm hover:text-green-700 
              {{ Request::is('rutinitasAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
              Rutinitas Santri
            </a>
          </li>
          <li>
            <a href="{{ route('rutinitas.umum.admin') }}" class="sidebar-link block px-4 py-2 text-sm hover:text-green-700 
              {{ Request::is('rutinitasUmumAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
              Rutinitas Umum
            </a>
          </li>
        </ul>
      </li>

      <!-- Menu Lainnya -->
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('syaikhunaAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('syaikhuna.admin') }}"><i class="fa-regular fa-id-card mr-2"></i>Syaikhuna</a></li>
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('pendaftaranAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('pendaftaran.admin') }}"><i class="fa-solid fa-circle-info mr-2"></i>Pendaftaran</a></li>
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('galeriAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('galeri.admin') }}"><i class="fa-solid fa-image mr-2"></i>Galeri</a></li>
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('postAdmin') || Request::is('post-admin/*') ? 'text-green-700 font-bold' : '' }}" href="{{ route('post.admin') }}"><i class="fa-solid fa-images mr-2"></i>Artikel</a></li>
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('kontakAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('kontak.admin') }}"><i class="fa-solid fa-phone mr-2"></i>Kontak</a></li>
      <li><a class="sidebar-link hover:text-green-700 {{ Request::is('/') ? 'text-green-700 font-bold' : '' }}" href="{{ route('beranda') }}"><i class="fa-solid fa-house-chimney mr-2"></i>Halaman Utama</a></li>

    </ul>
  </nav>
</aside>
