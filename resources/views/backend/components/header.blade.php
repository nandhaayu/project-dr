{{-- <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
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
          </li>
        </ul>
      </div>
    </nav>
  </header> --}}

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