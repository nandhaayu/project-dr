  <aside :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'" class="bg-white text-black h-full transition-all duration-300 flex flex-col">
    <div class="flex items-center justify-between px-4 py-3">
        <div class="flex items-center space-x-2">
            <img loading="lazy" src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-10">
            <span x-show="sidebarOpen" class="text-xl font-bold text-green-700">PONPES-DR</span>
        </div>
    </div>
    <nav class="flex-1 px-4 scroll-sidebar list-none space-y-3">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('dashboard') ? 'text-green-700 font-bold' : '' }}" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-bars mr-2"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('slideAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('slide.admin') }}">
                <i class="fa-solid fa-sliders mr-2"></i>
                <span class="hide-menu">Slide</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('pendaftars') ? 'text-green-700 font-bold' : '' }}" href="{{ route('pendaftars.index') }}">
              <i class="fa-solid fa-user-plus mr-2"></i>
              <span class="hide-menu">Pendaftar</span>
          </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('santris') ? 'text-green-700 font-bold' : '' }}" href="{{ route('santris.index') }}">
              <i class="fa-solid fa-users mr-2"></i>
              <span class="hide-menu">Santri</span>
          </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('berandaAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('beranda.admin') }}">
                <i class="fa-solid fa-house-chimney mr-2"></i>
                <span class="hide-menu">Beranda</span>
            </a>
        </li>
        <li class="sidebar-item group">
            <a class="sidebar-link hover:text-green-700 flex items-center justify-between 
                {{ Request::is('profilAdmin') || Request::is('kurikulumAdmin') || Request::is('rutinitasAdmin') || Request::is('rutinitasUmumAdmin') ? 'text-green-700 font-bold' : '' }}" href="#">
                <span class="flex items-center">
                    <i class="fa-solid fa-landmark mr-2"></i>
                    <span class="hide-menu">Tentang Kami</span>
                </span>
                <i class="ti ti-chevron-down transition-transform duration-300 group-hover:rotate-180"></i>
            </a>
            <!-- Dropdown Sub-Menu -->
            <ul class="sidebar-submenu hidden group-hover:block ml-6 mt-2 space-y-2">
                <li>
                    <a href="{{ route('profil.admin') }}" class="sidebar-link text-sm hover:text-green-700 
                        {{ Request::is('profilAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('kurikulum.admin') }}" class="sidebar-link text-sm hover:text-green-700 
                        {{ Request::is('kurikulumAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
                        Kurikulum
                    </a>
                </li>
                <li>
                    <a href="{{ route('rutinitas.admin') }}" class="sidebar-link text-sm hover:text-green-700 
                        {{ Request::is('rutinitasAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
                        Rutinitas Kegiatan Santri
                    </a>
                </li>
                <li>
                    <a href="{{ route('rutinitas.umum.admin') }}" class="sidebar-link text-sm hover:text-green-700 
                        {{ Request::is('rutinitasUmumAdmin') ? 'text-green-700 font-bold' : 'text-gray-600' }}">
                        Rutinitas Kegiatan Umum
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('syaikhunaAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('syaikhuna.admin') }}">
                <i class="fa-regular fa-id-card mr-2"></i>
                <span class="hide-menu">Syaikhuna</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('pendaftaranAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('pendaftaran.admin') }}">
                <i class="fa-solid fa-circle-info mr-2"></i>
                <span class="hide-menu">Pendaftaran</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('galeriAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('galeri.admin') }}">
                <i class="fa-solid fa-image mr-2"></i>
                <span class="hide-menu">Galeri</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('postAdmin') || Request::is('post-admin/*') ? 'text-green-700 font-bold' : '' }}" href="{{ route('post.admin') }}">
                <i class="fa-solid fa-images mr-2"></i>
                <span class="hide-menu">Artikel</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('kontakAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('kontak.admin') }}">
                <i class="fa-solid fa-phone mr-2"></i>
                <span class="hide-menu">Kontak</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('/') ? 'text-green-700 font-bold' : '' }}" href="{{ route('beranda') }}">
              <i class="fa-solid fa-house-chimney mr-2"></i>
              <span class="hide-menu">Halaman Utama</span>
            </a>
        </li>
    </nav>
</aside>
