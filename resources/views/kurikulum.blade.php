<x-layout>
  <section class="py-12 bg-gray-100">
      <div class="max-w-4xl mx-auto px-4">
          <div class="text-center mb-12">
              <h2 class="text-2xl font-bold text-gray-900 mb-4">Kurikulum Pendidikan</h2>
              <p class="text-gray-700 leading-relaxed">
                  Program Pendidikan Pondok Pesantren Daarur Rohmah memiliki dua program utama yang menjadi fokus utama dalam pendidikan:
              </p>
          </div>

          <!-- Program Tahfidz -->
          @foreach ($kurikulum as $d)
              <div class="bg-white p-8 rounded-lg shadow-lg mb-10 text-center">
                  <h2 class="font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                  <img src="{{ asset('storage/' . $d->foto) }}" 
                      alt="gambar" 
                      class="w-full h-auto rounded-lg mb-6 mx-auto" 
                      style="width: 100%; max-width: 400px; height: auto;">
                  <p class="text-gray-700 leading-relaxed">
                      {!! $d->deskripsi !!}
                  </p>
              </div>
          @endforeach
      </div>
  </section>
</x-layout>
