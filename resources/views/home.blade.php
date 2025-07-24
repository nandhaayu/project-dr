<x-layout>
  @include('components.banner')

  <!-- Tentang -->
  <section id="about" class="py-12">
    <div class="max-w-6xl mx-auto px-4 md:px-8">
      <h2 class="mb-4 text-2xl md:text-3xl font-bold text-gray-900 border-b-4 border-green-500 pb-2 inline-block">
        <i class="fa-regular fa-address-card px-2" aria-hidden="true"></i>Tentang Darur Rohmah
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        
        {{-- Video --}}
        @if ($beranda)
        <div>
          <div class="relative w-full overflow-hidden rounded-lg shadow-md pt-[56.25%]">
            <iframe
              srcdoc='
                <style>
                  *{padding:0;margin:0;overflow:hidden}
                  html,body{height:100%}
                  img{position:absolute;width:100%;top:0;left:0;object-fit:cover}
                  button{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding:1rem 2rem;background:#16a34a;color:#fff;border:none;border-radius:.5rem;font-size:1rem;cursor:pointer}
                </style>
                <a href="{{ $beranda->link }}">
                  <img src="https://img.youtube.com/vi/{{ \Illuminate\Support\Str::after($beranda->link, 'embed/') }}/hqdefault.jpg" alt="Video Profil">
                  <button>Tonton Video</button>
                </a>'
              frameborder="0" allowfullscreen class="absolute top-0 left-0 w-full h-full" loading="lazy">
            </iframe>
          </div>
        </div>
        @endif

        {{-- Profil --}}
        @if ($profil)
        <div>
          <div class="overflow-x-auto mb-4">
            <table class="w-full border-spacing-y-2 border-separate text-sm">
              <tbody>
                <tr>
                  <td class="font-semibold w-48 whitespace-nowrap align-top">
                    <i class="fas fa-map-marker-alt mr-2" aria-hidden="true"></i>Alamat
                  </td>
                  <td>: Kedung, Buaran, Kec. Mayong, Kab. Jepara, Jawa Tengah 59465</td>
                </tr>
                <tr>
                  <td class="font-semibold align-top">
                    <i class="fas fa-calendar-alt mr-2" aria-hidden="true"></i>Didirikan
                  </td>
                  <td>: 2010</td>
                </tr>
                <tr>
                  <td class="font-semibold align-top">
                    <i class="fas fa-user mr-2" aria-hidden="true"></i>Pengasuh
                  </td>
                  <td>: Habib Syahir Sodiq Alhindwan, S.Pd., Lc</td>
                </tr>
                <tr>
                  <td class="font-semibold align-top">
                    <i class="fas fa-phone mr-2" aria-hidden="true"></i>Kontak
                  </td>
                  <td>: <a href="https://wa.me/6285712225557" class="text-blue-600 hover:underline">0856-0077-5094</a></td>
                </tr>
                <tr>
                  <td class="font-semibold align-top">
                    <i class="fas fa-globe mr-2" aria-hidden="true"></i>Website
                  </td>
                  <td>: <a href="https://ponpesdarurrohmah.com" class="text-blue-600 hover:underline">ponpesdarurrohmah.com</a></td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="text-gray-600 text-sm text-justify mb-4">
            {!! Str::words($profil->deskripsi, 70, '...') !!}
          </p>
          <a href="{{ route('profil') }}" class="inline-block bg-green-500 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">
            Baca Selengkapnya
          </a>
        </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Artikel -->
  <section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">

        {{-- Artikel Utama --}}
        <div class="lg:w-2/3">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-900 border-b-4 border-green-500 pb-2 mb-6">
            <i class="fa-solid fa-photo-film px-2" aria-hidden="true"></i>Artikel Terkini
          </h2>

          @foreach ($posts as $d)
          <div class="mb-6 flex flex-col sm:flex-row gap-4 p-4 bg-white rounded-lg shadow-sm">
            <a href="{{ route('show.singlePost', $d->id) }}" class="w-full sm:w-72 flex-shrink-0">
              <img loading="lazy" src="{{ asset('storage/' . $d->image) }}" alt="{{ $d->title }}" class="w-full h-44 object-cover rounded-lg">
            </a>
            <div class="flex-1">
              <h3 class="font-semibold text-gray-900 mb-2">{{ $d->title }}</h3>
              <p class="text-gray-700 text-sm mb-2 text-justify">{!! Str::words(strip_tags($d->body), 25, '...') !!}</p>
              <a href="{{ route('show.singlePost', $d->id) }}" class="text-green-500 hover:underline text-sm">Baca Selengkapnya</a>
            </div>
          </div>
          @endforeach
        </div>

        {{-- Sidebar Berita Terbaru --}}
        <div class="lg:w-1/3 space-y-6">

          {{-- Form Pencarian --}}
          <div class="p-4 border rounded-lg shadow-sm bg-white">
            <form action="{{ route('posts.search') }}" method="GET" class="flex">
              <input type="text" name="query" placeholder="Cari berita atau artikel..." value="{{ request('query') }}"
                class="flex-1 px-4 py-2 rounded-l border-none focus:ring-2 focus:ring-green-500 text-sm" />
              <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-r hover:bg-green-600 text-sm">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>

          {{-- Card Syaikhuna --}}
          @if ($syaikhuna)
          <div class="p-4 bg-white rounded-lg shadow-sm text-center">
            <img loading="lazy" src="{{ asset('storage/' . $syaikhuna->foto) }}" alt="{{ $syaikhuna->nama }}"
              class="w-full h-auto object-cover rounded-lg mb-3">
            <h3 class="font-semibold text-gray-800">{{ $syaikhuna->nama }}</h3>
            <p class="text-gray-600 text-sm my-2">- Pengasuh Pondok Pesantren -</p>
            <p class="text-gray-700 text-sm mb-3">
              {!! Str::words(strip_tags($syaikhuna->deskripsi ?? 'Deskripsi tidak tersedia'), 25, '...') !!}
            </p>
            <a href="{{ url('/syaikhuna') }}" class="text-green-500 text-sm font-medium hover:underline">Baca Selengkapnya</a>
          </div>
          @endif

          {{-- Gambar Beranda --}}
          @if ($beranda)
          <div class="p-4 bg-white rounded-lg shadow-sm">
            <img loading="lazy" src="{{ asset('storage/' . $beranda->foto) }}" alt="Beranda" class="w-full h-auto object-cover rounded-lg">
          </div>
          @endif

        </div>
      </div>
    </div>
  </section>
</x-layout>
