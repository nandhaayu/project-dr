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
  <div class="marquee-container relative overflow-hidden w-full">
    <div class="marquee flex items-center">
      <p class="text-md font-bold mx-8 flex items-center">
        <i class="fas fa-mosque text-yellow-400 mr-2"></i> Pondok Pesantren Darur Rohmah
      </p>
      <p class="text-md font-bold mx-8 flex items-center">
        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i> Kedung, Buaran, Kec. Mayong, Jepara, Jawa Tengah 59465
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
      white-space: nowrap;
      animation: marquee 20s linear infinite; /* Animasi lebih pelan */
  }

  .marquee p {
      margin-right: 40px; /* Jarak antar teks */
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