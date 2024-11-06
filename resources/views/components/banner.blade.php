<section class="relative w-full h-screen">
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