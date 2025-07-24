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

          function showSlide(galleryId, index) {
            let gallery = document.getElementById("carousel-" + galleryId);
            let slides = gallery.children;
            let totalSlides = parseInt(gallery.getAttribute("data-total"));
            
            index = (index + totalSlides) % totalSlides; // Pastikan indeks tidak keluar dari batas
            gallery.setAttribute("data-current", index);

            Array.from(slides).forEach((slide, i) => {
                slide.classList.toggle("opacity-100", i === index);
                slide.classList.toggle("pointer-events-auto", i === index);
                slide.classList.toggle("opacity-0", i !== index);
                slide.classList.toggle("pointer-events-none", i !== index);
            });
        }

        function nextSlide(galleryId) {
            let gallery = document.getElementById("carousel-" + galleryId);
            let currentSlide = parseInt(gallery.getAttribute("data-current") || 0);
            showSlide(galleryId, currentSlide + 1);
        }

        function prevSlide(galleryId) {
            let gallery = document.getElementById("carousel-" + galleryId);
            let currentSlide = parseInt(gallery.getAttribute("data-current") || 0);
            showSlide(galleryId, currentSlide - 1);
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("[id^='carousel-']").forEach(gallery => {
                gallery.setAttribute("data-current", 0);
                let totalSlides = parseInt(gallery.getAttribute("data-total"));
                
                if (totalSlides > 1) {
                    setInterval(() => {
                        let currentSlide = parseInt(gallery.getAttribute("data-current") || 0);
                        showSlide(gallery.id.replace('carousel-', ''), currentSlide + 1);
                    }, 3000);
                }
            });
        });