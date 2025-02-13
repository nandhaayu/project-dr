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



{{-- <section class="relative w-full h-[300px] md:h-screen">
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
</script> --}}