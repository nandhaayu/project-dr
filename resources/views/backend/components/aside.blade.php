<aside class="left-sidebar">
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
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item group">
            <a class="sidebar-link flex items-center justify-between" href="#" aria-expanded="false">
                <span class="flex items-center">
                    <i class="ti ti-layout-dashboard"></i>
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
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>