<x-layout>
    <section class="py-12 bg-gray-100">
      <div class="max-w-6xl mx-auto px-4">
          <div class="text-center mb-12">
              <h1 class="text-4xl font-bold text-gray-900 mb-4">Kurikulum Tahfidz dan Kajian Kitab</h1>
              <p class="text-gray-700 leading-relaxed">
                  Pondok Pesantren Darruh Rahmah memfokuskan kurikulumnya pada dua aspek utama, yaitu program Tahfidzul Qur'an dan pembelajaran Kitab Kuning. Kedua program ini bertujuan membentuk santri yang hafidz Al-Qur'an serta memiliki pemahaman agama yang mendalam melalui kajian kitab-kitab klasik.
              </p>
          </div>
  
          <!-- Program Tahfidz -->
          @foreach ($kurikulum as $d)
            <div class="bg-white p-6 rounded-lg shadow-lg mb-10">
                <img src="{{ asset('assets/images/' . $d->foto) }}" alt="gambar" class="w-full h-auto rounded-lg mb-6" style="width: 100%; max-width: 200px; height: auto;">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! $d->deskripsi !!}
                </p>
            </div>
              
          {{-- <!-- Hiasan Anak Panah -->
          <div class="text-center mb-10">
            <i class="fa-regular fa-circle-down text-green-700" style="font-size: 80px"></i>
          </div> --}}
          @endforeach
      </div>
    </section>
  </x-layout>
  