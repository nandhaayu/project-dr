<x-layout>
  @include('components.banner')
  <!-- untuk menampilkan video youtube dan profil singkat -->
  <section id="about" class="py-12">
    <div class="max-w-6xl mx-auto px-8">
      <h2 class="mb-2 text-2xl sm:text-xl md:text-3xl w-full font-bold text-gray-900 border-b-4 border-green-500 inline-block pb-2"><i class="fa-regular fa-address-card px-2"></i>Tentang Darur Rohmah</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-center">
              @if ($beranda)
              <div class="aspect-w-16 aspect-h-9">
                <iframe src="{{ $beranda->link }}" title="Video Profil" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-72 rounded-lg shadow-md"></iframe>
              </div>
              @endif
            </div>
            <div class="text-justify">
              @if ($profil)
                  <!-- Tabel Informasi -->
                  <div class="w-full rounded-lg mb-2 overflow-x-auto">
                    <table class="w-full table-fixed border-separate border-spacing-y-2">
                        <tbody>
                            <tr>
                                <td class="font-semibold w-[180px] sm:w-[200px] align-top whitespace-nowrap text-left">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Alamat</span>
                                    </div>
                                </td>
                                <td class="px-2 text-left">: Kedung, Buaran, Kec. Mayong, Kab. Jepara, Jawa Tengah 59465, Indonesia</td>
                            </tr>
                            <tr>
                                <td class="font-semibold w-[180px] sm:w-[200px] align-top whitespace-nowrap text-left">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Didirikan</span>
                                    </div>
                                </td>
                                <td class="px-2 text-left">: 2010</td>
                            </tr>
                            <tr>
                                <td class="font-semibold w-[180px] sm:w-[200px] align-top whitespace-nowrap text-left">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-user"></i>
                                        <span>Pengasuh</span>
                                    </div>
                                </td>
                                <td class="px-2 text-left">: Habib Syahir Sodiq Alhindwan, S.Pd., Lc</td>
                            </tr>
                            <tr>
                                <td class="font-semibold w-[180px] sm:w-[200px] align-top whitespace-nowrap text-left">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-phone"></i>
                                        <span>Kontak</span>
                                    </div>
                                </td>
                                <td class="px-2 text-left">
                                    <a href="https://wa.me/6285712225557" target="_blank" class="text-blue-600 hover:underline">: 0856-0077-5094</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-semibold w-[180px] sm:w-[200px] align-top whitespace-nowrap text-left">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-globe"></i>
                                        <span>Website</span>
                                    </div>
                                </td>
                                <td class="px-2 text-left">
                                    <a href="https://ponpesdarurrohmah.com" target="_blank" class="text-blue-600 hover:underline">: ponpesdarurrohmah.com</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>

                  <!-- Deskripsi -->
                  <p class="text-gray-600 mb-3 text-sm text-justify">
                    {!! Str::words($profil->deskripsi, 70, '...') !!}
                  </p>
              @endif
          
              <div class="mt-2">
                <a href="{{ route('profil') }}" class="text-sm inline-block bg-green-500 text-white px-2 py-2 rounded-lg hover:bg-green-700 transition">
                  Baca Selengkapnya
              </a>
              </div>
          </div>
                    
        </div>
    </div>
  </section>
  <section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column: Artikel -->
        <div class="lg:w-2/3 w-full px-4">
          <div class="mb-4">
            <h2 class="text-2xl sm:text-xl md:text-3xl font-bold text-gray-900 border-b-4 border-green-500 w-full inline-block pb-2">
              <i class="fa-solid fa-photo-film px-2"></i>Artikel Terkini
            </h2>
          </div>
        
          @foreach ($posts as $d)
          <div class="mb-6 flex flex-col sm:flex-row items-start gap-4 p-6 shadow-sm">
            <a href="{{ route('show.singlePost', $d->id) }}}}">
              <img src="{{ asset('storage/' . $d->image) }}" alt="Foto Artikel 1" class="w-full sm:w-72 h-44 object-cover rounded-lg mb-4 sm:mb-0">
            </a>
            <div class="flex-1">
              <a href="{{ route('show.singlePost', $d->id) }}">
                <h3 class="font-bold text-gray-900 mb-2">{{ $d['title'] }}</h3>
              </a>
              <p class="text-gray-700 leading-relaxed mb-2 text-sm text-justify">{!! Illuminate\Support\Str::words(strip_tags($d->body), 25, '...') !!}</p>
              <div class="mt-2">
                <a href="{{ route('show.singlePost', $d->id) }}" class="text-green-500 hover:underline text-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>        
        <!-- Right: Berita Terbaru -->
        <div class="lg:w-1/3">
          <div class="mb-6">
            <div class="flex items-center border border-gray-300 rounded-lg shadow-sm bg-white">
              <!-- Ikon Pencarian -->
              <div class="px-4 text-gray-600">
                <i class="fa fa-search"></i> <!-- Ganti dengan ikon sesuai kebutuhan -->
              </div>
              
              <!-- Form Pencarian -->
              <form action="{{ route('posts.search') }}" method="GET" class="flex w-full">
                <input 
                  type="text" 
                  name="query" 
                  placeholder="Cari berita atau artikel..." 
                  class="w-full px-4 py-2 border-0 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-l-lg"
                  value="{{ request('query') }}"> <!-- Menampilkan query saat ini -->
                <button type="submit" class="px-4 py-2 bg-green-500 text-white hover:bg-green-600 rounded-r-lg">
                  Cari
                </button>
              </form>
            </div>
            
            <div class="space-y-6">
              <!-- Berita 1 -->
              @if ($syaikhuna)
              <div class="p-4 shadow-sm text-center">
                <img src="{{ asset('storage/' . $syaikhuna->foto) }}" alt="Berita 1" class="w-full h-auto object-cover rounded-lg mb-3">
                <h3 class="font-semibold text-gray-800">{{ $syaikhuna->nama }}</h3>
                <p class="text-gray-600 text-sm mt-2 mb-2">-Pengasuh Pondok Pesantren Darur Rohmah-</p>
                {{-- <p class="text-gray-600 text-sm mt-2">{!! Str::words($syaikhuna->deskripsi, 70, '...') !!}</p>
                <a href="{{ route('syaikhuna') }}" class="text-green-500 text-sm">Baca Selengkapnya</a> --}}
                <p class="text-gray-700 leading-relaxed mb-2 text-sm">
                  {!! Illuminate\Support\Str::words(strip_tags($syaikhuna->deskripsi ?? 'Deskripsi tidak tersedia'), 25, '...') !!}
                </p>
                <a href="{{ url('/syaikhuna') }}" class="text-green-500 text-sm font-medium hover:underline">Baca Selengkapnya</a>
              </div>
              @endif
              <div class="p-4 shadow-sm">
                @if ($beranda)
                <img src="{{ asset('storage/'. $beranda->foto) }}" alt="Berita 1" class="w-full h-full object-cover rounded-lg mb-3">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
</x-layout>
