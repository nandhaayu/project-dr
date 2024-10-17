<nav class="bg-teal-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
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
              <!-- Current: "bg-teal-900 text-white", Default: "text-teal-300 hover:bg-teal-700 hover:text-white" -->
              <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
              <div class="relative group">
                <x-nav-link href="#" :active="request()->is('kami')">Tentang Kami</x-nav-link>
                <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 py-2 w-64">
                    <a href="/profil" class="block px-4 py-2 text-sm text-teal-700 hover:bg-teal-100">Profil</a>
                    <a href="/kurikulum" class="block px-4 py-2 text-sm text-teal-700 hover:bg-teal-100">Kurikulum (Tahfidz & Kitab)</a>
                    <a href="/rutinitas" class="block px-4 py-2 text-sm text-teal-700 hover:bg-teal-100">Rutinitas (Jadwal Kegiatan)</a>
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
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-teal-800 p-2 text-teal-400 hover:bg-teal-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-teal-800" aria-controls="mobile-menu" aria-expanded="false">
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
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-teal-900 text-white", Default: "text-teal-300 hover:bg-teal-700 hover:text-white" -->
        <a href="/" class="block rounded-md bg-teal-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Beranda</a>
        <a href="/kami" class="block rounded-md px-3 py-2 text-base font-medium text-teal-300 hover:bg-teal-700 hover:text-white">Kami</a>
        <a href="/syaikhuna" class="block rounded-md px-3 py-2 text-base font-medium text-teal-300 hover:bg-teal-700 hover:text-white">Syaikhuna</a>
        <a href="/pendaftaran" class="block rounded-md px-3 py-2 text-base font-medium text-teal-300 hover:bg-teal-700 hover:text-white">Pendaftaran</a>
        <a href="/galeri" class="block rounded-md px-3 py-2 text-base font-medium text-teal-300 hover:bg-teal-700 hover:text-white">Galeri</a>
        <a href="/kontak" class="block rounded-md px-3 py-2 text-base font-medium text-teal-300 hover:bg-teal-700 hover:text-white">Kontak</a>
      </div>
      <div class="border-t border-teal-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="text-sm font-medium leading-none text-teal-400">tom@example.com</div>
          </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-teal-400 hover:bg-teal-700 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-teal-400 hover:bg-teal-700 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-teal-400 hover:bg-teal-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>