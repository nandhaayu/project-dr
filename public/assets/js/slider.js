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