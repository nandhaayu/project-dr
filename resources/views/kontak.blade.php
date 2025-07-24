<x-layout>
@if ($kontak)
  <!-- Lokasi Kami -->
  <section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Lokasi Kami</h2>

      <!-- Lazy Embed Google Maps -->
      <div class="w-full h-64 rounded-lg overflow-hidden relative">
        <iframe
          src="{{ $kontak->link_maps }}"
          loading="lazy"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"
          aria-label="Lokasi Pondok Pesantren Darur Rohmah"
          class="absolute top-0 left-0 w-full h-full">
        </iframe>
      </div>
    </div>
  </section>

  <!-- Informasi Kontak -->
  <section class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Alamat -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="fa-solid fa-location-dot mr-2" aria-hidden="true"></i>Alamat
          </h3>
          <p class="text-gray-600 text-sm">{!! $kontak->alamat !!}</p>
        </div>

        <!-- Telepon -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="fa-solid fa-phone mr-2" aria-hidden="true"></i>Telepon
          </h3>
          <p class="text-gray-600 text-sm">{!! $kontak->telepon !!}</p>
        </div>

        <!-- Email -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="fa-solid fa-envelope mr-2" aria-hidden="true"></i>Email
          </h3>
          <p class="text-gray-600 text-sm">{{ $kontak->email }}</p>
        </div>

        <!-- Jam Operasional -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="fa-solid fa-clock mr-2" aria-hidden="true"></i>Jam Operasional
          </h3>
          <p class="text-gray-600 text-sm">{!! $kontak->jam !!}</p>
        </div>

      </div>
    </div>
  </section>
@endif
</x-layout>
