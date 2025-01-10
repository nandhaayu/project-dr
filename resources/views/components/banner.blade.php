<section class="relative w-full h-[300px] md:h-screen">
  <!-- Container for slides -->
  <div class="relative overflow-hidden w-full h-full">
    @foreach ($slide as $d)
    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" id="slide1">
      <img src="{{ asset('storage/' . $d->foto) }}" alt="Slide 1" class="w-full md:h-full h-[300px] object-cover">
    </div>
    @endforeach

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