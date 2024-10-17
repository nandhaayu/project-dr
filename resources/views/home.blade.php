<x-layout>
  <x-slot name="title">
        <div class="flex items-center justify-between">
        <!-- Title -->
        <div class="mr-3 flex justify-center">
          <p>Informasi</p>
          <img class="h-10 w-10 ml-4" src="assets/img/info.png" alt="">
        </div>

        <!-- Marquee Text -->
        <div class="overflow-hidden whitespace-nowrap flex-grow mr-4">
            <p class="animate-marquee inline-block text-2xl font-semibold text-black px-10">
                Selamat Datang di Pondok Pesantren Darruh Rahmah! 🎉
            </p>
        </div>
    </div>
  </x-slot>
  

<!-- Tambahkan animasi marquee ke CSS -->
<style>
    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-marquee {
        animation: marquee 10s linear infinite;
    }
</style>


  <section class="relative w-full h-screen bg-gray-900">
    <!-- Container for slides -->
    <div class="relative overflow-hidden w-full h-full">
      <!-- Slide 1 -->
      <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" id="slide1">
        <img src="assets/img/banner-1.jpg" alt="Slide 1" class="w-full h-full object-cover">
      </div>
      <!-- Slide 2 -->
      <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" id="slide2">
        <img src="assets/img/banner-2.jpg" alt="Slide 2" class="w-full h-full object-cover">
      </div>
      <!-- Slide 3 -->
      <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" id="slide3">
        <img src="assets/img/banner-1.jpg" alt="Slide 3" class="w-full h-full object-cover">
        {{-- <img src="https://via.placeholder.com/1920x1080/32CD32/FFFFFF?text=Slide+3" alt="Slide 3" class="w-full h-full object-cover"> --}}
      </div>
    </div>
  
    <!-- Navigation buttons -->
    <div class="absolute inset-x-0 bottom-5 flex justify-center space-x-3">
      <button onclick="showSlide(1)" class="bg-white w-4 h-4 rounded-full"></button>
      <button onclick="showSlide(2)" class="bg-white w-4 h-4 rounded-full"></button>
      <button onclick="showSlide(3)" class="bg-white w-4 h-4 rounded-full"></button>
    </div>
  </section>
  
  <script>
    let currentSlide = 1;
  
    function showSlide(slideIndex) {
      const slides = document.querySelectorAll('[id^="slide"]');
      slides.forEach((slide, index) => {
        slide.style.opacity = (index + 1 === slideIndex) ? '1' : '0';
      });
      currentSlide = slideIndex;
    }
  
    // Auto slide every 5 seconds
    setInterval(() => {
      currentSlide = (currentSlide % 3) + 1;
      showSlide(currentSlide);
    }, 5000);
  </script>

  
</x-layout>