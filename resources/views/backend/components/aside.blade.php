{{-- <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" width="50" alt="Logo" />
                <p class="mb-0 ms-2 text-green-700 font-bold text-xl">PONPES-DR</p>
            </div>            
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-bars"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('slide.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-sliders"></i>
              </span>
              <span class="hide-menu">Slide</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('beranda.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-house-chimney"></i>
              </span>
              <span class="hide-menu">Beranda</span>
            </a>
          </li>
          <li class="sidebar-item group">
            <a class="sidebar-link flex items-center justify-between" href="#" aria-expanded="false">
                <span class="flex items-center">
                    <i class="fa-regular fa-id-card"></i>
                    <span class="hide-menu ml-2">Tentang Kami</span>
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
                        Rutinitas Kegiatan
                    </a>
                </li>
            </ul>
          </li>     
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('syaikhuna.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-user"></i>
              </span>
              <span class="hide-menu">Syaikhuna</span>
            </a>
          </li>   
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('pendaftaran.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-clipboard"></i>
              </span>
              <span class="hide-menu">Pendaftaran</span>
            </a>
          </li>   
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('galeri.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-images"></i>
              </span>
              <span class="hide-menu">Galeri</span>
            </a>
          </li>   
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('post.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-images"></i>
              </span>
              <span class="hide-menu">Artikel</span>
            </a>
          </li>   
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kontak.admin') }}" aria-expanded="false">
              <span>
                <i class="fa-solid fa-phone"></i>
              </span>
              <span class="hide-menu">Kontak</span>
            </a>
          </li>   
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside> --}}

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
            <a class="sidebar-link hover:text-green-700 {{ Request::is('berandaAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('beranda.admin') }}">
                <i class="fa-solid fa-house-chimney mr-2"></i>
                <span class="hide-menu">Beranda</span>
            </a>
        </li>
        <li class="sidebar-item group">
            <a class="sidebar-link hover:text-green-700 flex items-center justify-between 
                {{ Request::is('profilAdmin') || Request::is('kurikulumAdmin') || Request::is('rutinitasAdmin') || Request::is('rutinitasUmumAdmin') ? 'text-green-700 font-bold' : '' }}" href="#">
                <span class="flex items-center">
                    <i class="fa-regular fa-id-card mr-2"></i>
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
                <i class="fa-solid fa-clipboard mr-2"></i>
                <span class="hide-menu">Pendaftaran</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link hover:text-green-700 {{ Request::is('galeriAdmin') ? 'text-green-700 font-bold' : '' }}" href="{{ route('galeri.admin') }}">
                <i class="fa-solid fa-images mr-2"></i>
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
