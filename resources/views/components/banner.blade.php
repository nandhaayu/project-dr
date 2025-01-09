<section class="relative w-full h-screen">
  <!-- Container for slides -->
  <div class="relative overflow-hidden w-full h-full">
    @foreach ($slide as $d)
    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" id="slide1">
      <img src="{{ asset('storage/' . $d->foto) }}" alt="Slide 1" class="w-full h-full object-cover">
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
    const slides = document.querySelectorAll('[id^="slide"]'); // Ambil semua elemen slide
    const totalSlides = slides.length; // Hitung jumlah slide

    // Pastikan slideIndex tetap dalam batas jumlah slide
    slideIndex = ((slideIndex - 1) % totalSlides) + 1;

    // Atur visibilitas slide
    slides.forEach((slide, index) => {
      slide.style.opacity = (index + 1 === slideIndex) ? '1' : '0';
    });

    currentSlide = slideIndex; // Perbarui slide saat ini
  }

  // Auto slide setiap 5 detik
  setInterval(() => {
    showSlide(currentSlide + 1); // Pindah ke slide berikutnya
  }, 5000);

  // Inisialisasi slide pertama
  document.addEventListener("DOMContentLoaded", () => {
    showSlide(currentSlide);
  });
</script>
