  <header class="bg-white px-4 py-6 flex justify-between items-center relative">
  <!-- Tombol Sidebar -->
  <button @click="sidebarOpen = !sidebarOpen" class="text-black text-2xl focus:outline-none">
    &#9776;
  </button>

  <!-- Bagian Kanan -->
  <div class="flex items-center space-x-4">
    
    <!-- Notifikasi -->
    <div class="relative mr-3">
      <a href="javascript:void(0)" id="notifToggle" class="nav-link nav-icon-hover relative">
        <!-- Ikon Lonceng -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 hover:text-black" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a1 1 0 00-2 0v1.083A6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>

        @if ($jumlahNotifikasi > 0)
          <span class="absolute -top-1 -right-2 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
            {{ $jumlahNotifikasi }}
          </span>
        @endif
      </a>

      <!-- Dropdown Notifikasi -->
      <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border shadow-lg rounded-md z-50">
        <div class="p-3 border-b font-semibold text-gray-700">
          Notifikasi Pendaftar Baru
        </div>
        <div class="max-h-64 overflow-y-auto">
          @forelse ($pendaftars->where('status', 'pending') as $pendaftar)
            <a href="{{ route('pendaftars.index', $pendaftar->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
              {{ $pendaftar->nama }} - {{ $pendaftar->created_at->format('d/m/Y') }}
            </a>
          @empty
            <div class="px-4 py-2 text-sm text-gray-500">Tidak ada notifikasi baru.</div>
          @endforelse
        </div>
      </div>
    </div>

    <!-- Profil -->
    <div class="relative">
      <a href="javascript:void(0)" id="profileToggle" class="nav-link nav-icon-hover">
        <img loading="lazy" src="/backend/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-full">
      </a>
      <div id="profileDropdown" class="hidden absolute right-0 mt-2 bg-white shadow-md border rounded-lg w-48 z-50">
        <div class="p-3">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full text-left text-sm px-4 py-2 border-2 rounded-lg border-green-700 text-green-700 hover:bg-green-700 hover:text-white">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>

  </div>
</header>
<script>
  document.addEventListener('click', function (e) {
    const notifBtn = document.getElementById('notifToggle');
    const notifMenu = document.getElementById('notifDropdown');
    const profileBtn = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileDropdown');

    if (notifBtn.contains(e.target)) {
      notifMenu.classList.toggle('hidden');
    } else if (!notifMenu.contains(e.target)) {
      notifMenu.classList.add('hidden');
    }

    if (profileBtn.contains(e.target)) {
      profileMenu.classList.toggle('hidden');
    } else if (!profileMenu.contains(e.target)) {
      profileMenu.classList.add('hidden');
    }
  });
</script>

