<section class="relative w-full h-[300px] md:h-screen">
  <!-- Container for slides -->
  <div class="relative overflow-hidden w-full h-full">
    @foreach ($slide as $index => $d)
    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}" id="slide{{ $index }}">
      <img src="{{ asset('storage/' . $d->foto) }}" alt="Slide {{ $index + 1 }}" class="w-full md:h-full h-[300px] object-cover">
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

<style>
@keyframes marquee {
  from {
      transform: translateX(100%);
  }
  to {
      transform: translateX(-100%);
  }
}

.marquee {
  display: flex;
  gap: 40px; /* Memberi jarak antar teks */
  animation: marquee 30s linear infinite;
  min-width: 100%; /* Pastikan cukup lebar agar teks tidak terpotong */
}
</style>




<script>
  document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll('[id^="slide"]');
    const buttons = document.querySelectorAll('.slide-button');
    const totalSlides = slides.length;

    function showSlide(slideIndex) {
      slides.forEach((slide, index) => {
        slide.classList.toggle('opacity-100', index === slideIndex);
        slide.classList.toggle('opacity-0', index !== slideIndex);
        slide.classList.toggle('pointer-events-auto', index === slideIndex);
        slide.classList.toggle('pointer-events-none', index !== slideIndex);
      });

      buttons.forEach((btn, index) => {
        btn.classList.toggle('bg-green-500', index === slideIndex);
      });

      currentSlide = slideIndex;
    }

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        showSlide(parseInt(button.dataset.slide));
      });
    });

    // Auto slide setiap 5 detik
    setInterval(() => {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    }, 5000);
  });
</script>