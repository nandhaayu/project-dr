<x-layout>
  @include('components.banner')
  <section id="about" class="py-12">
    <div class="max-w-6xl mx-auto px-8">
      <h2 class="mb-3 text-2xl w-full font-bold text-gray-900 border-b-4 border-green-500 inline-block pb-2"><i class="fa-regular fa-address-card px-2"></i>Tentang Daarur Rohmah</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-center">
              <div class="aspect-w-16 aspect-h-9">
                <iframe src="https://www.youtube.com/embed/C1zZ8cbWru4?si=RR3FTNm9FmdhbjOg" title="Video Profil" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-72 rounded-lg shadow-md"></iframe>
              </div>
            </div>
            <div>
              @if ($profil)
                <p class="text-gray-600 mb-3 text-sm">
                    {!! Illuminate\Support\Str::words(strip_tags($profil->deskripsi), 100, '...') !!}
                </p>
              @endif
              <a href="{{ route('profil') }}" class="text-sm inline-block bg-green-500 text-white px-2 py-2 rounded-lg hover:bg-green-700 transition">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
  </section>
  <section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column: Artikel -->
        <div class="lg:w-2/3">
          <div class="mb-4">
            <h2 class="text-2xl w-full font-bold text-gray-900 border-b-4 border-green-500 inline-block pb-2"><i class="fa-solid fa-photo-film px-2"></i>Galeri Terkini</h2>
          </div>
          @foreach ($posts as $d)
          <div class="mb-6 flex items-start gap-4 p-6 shadow-sm">
            <img src="{{ asset('assets/images/' . $d->image) }}" alt="Foto Artikel 1" class="w-72 h-44 object-cover rounded-lg">
            <div>
              <h3 class="font-bold text-gray-900 mb-2">{{ $d['title'] }}</h3>
              <p class="text-gray-700 leading-relaxed mb-2 text-sm">{!! $d['body'] !!}</p>
              <a href="{{ route('show.singlePost', $d->id) }}" class="text-green-500 hover:underline text-sm">Baca Selengkapnya</a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Right: Berita Terbaru -->
        <div class="lg:w-1/3">
          <div class="mb-6">
            <div class="flex items-center border border-gray-300 shadow-sm">
              <!-- Logo / Icone Pencarian -->
              <span class="px-4 py-2 text-gray-600">
                <i class="fa fa-search"></i> <!-- Ganti dengan logo atau ikon lainnya -->
              </span>
              <!-- Kolom Pencarian -->
              <input type="text" placeholder="Cari Berita..." class="w-full px-4 py-2 border-0 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="space-y-6">
              <!-- Berita 1 -->
              @foreach ($syaikhuna as $d)
              <div class="p-4 shadow-sm text-center">
                <img src="{{ asset('storage/' . $d->foto) }}" alt="Berita 1" class="w-100 h-full object-cover rounded-lg mb-3">
                <h3 class="font-semibold text-gray-800">Habib Syahir Sodiq Alhindwan, S.Pd., Lc</h3>
                <p class="text-gray-600 text-sm mt-2">-Pengasuh Pondok Pesantren Daarur Rohmah-</p>
                <p class="text-gray-600 text-sm mt-2">{!! Illuminate\Support\Str::words(strip_tags($d->deskripsi), 20, '...') !!}</p>
                <a href="{{ route('syaikhuna') }}" class="text-green-500 hover:underline text-sm">Baca Selengkapnya</a>
              </div>
              @endforeach
              <div class="p-4 shadow-sm">
                <img src="{{ asset('assets/img/pamflet.png') }}" alt="Berita 1" class="w-full h-full object-cover rounded-lg mb-3">
                {{-- <h4 class="text-xl font-semibold text-gray-800">Judul Berita 1</h4>
                <p class="text-gray-600 text-sm mt-2">Deskripsi singkat berita terbaru yang memberikan informasi menarik dan relevan.</p>
                <a href="#" class="text-teal-500 hover:underline text-sm">Baca Selengkapnya</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
</x-layout>
