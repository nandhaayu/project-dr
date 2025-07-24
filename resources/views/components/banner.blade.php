<section class="relative w-full h-[300px] md:h-screen">
  <!-- Container for slides -->
  <div class="relative overflow-hidden w-full h-full">
    @foreach ($slide as $index => $d)
    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}" id="slide{{ $index }}">
    <picture>
      <source srcset="{{ asset('storage/images/foto.webp') }}" type="image/webp">
      <img src="{{ asset('storage/images/foto.jpg') }}" alt="Foto" loading="lazy" width="600" height="400">
    </picture>
    </div>
    @endforeach
  </div>

  <!-- Navigation buttons -->
  <div class="absolute inset-x-0 bottom-5 flex justify-center space-x-3">
    @foreach ($slide as $index => $d)
    <button data-slide="{{ $index }}" class="bg-white w-4 h-4 rounded-full slide-button {{ $index === 0 ? 'bg-green-500' : '' }}"></button>
    @endforeach
  </div>
</section>

<section class="bg-gray-800 text-white py-2 px-4 flex items-center overflow-hidden">
  <!-- Animasi Pengumuman -->
  <div class="relative w-full overflow-hidden">
      <div class="marquee flex items-center whitespace-nowrap">
          <!-- Teks Pondok Pesantren -->
          <p class="text-m md:text-md font-bold mx-4 flex items-center">
              <i class="fas fa-mosque text-yellow-400 mr-2"></i> Pondok Pesantren Darur Rohmah
          </p>
          <!-- Teks Lokasi (Hanya muncul di desktop) -->
          <p class="text-m md:text-md font-bold mx-4 hidden md:block items-center">
              <i class="fas fa-map-marker-alt text-red-500 mr-2"></i> Kedung, Buaran, Kecamatan Mayong, Kabupaten Jepara, Jawa Tengah 59465, Indonesia
          </p>
      </div>
  </div>
</section>
