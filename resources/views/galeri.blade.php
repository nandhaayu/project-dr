{{-- <x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($galeri as $d)
                <article class="w-full mx-auto border rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <!-- Featured Image -->
                    <img src="{{ asset('storage/' . $d->foto) }}" alt="{{ $d['judul'] }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <!-- Title -->
                        <h2 class="mb-1 tracking-tight text-center font-bold">{{ $d['judul'] }}</h2>
                    </div>
                </article>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $galeri->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
</x-layout> --}}


<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($galeri as $d)
                <article class="w-full mx-auto border rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="relative w-full h-48 overflow-hidden">
                        @php
                            $fotos = is_array($d->foto) ? $d->foto : json_decode($d->foto, true);
                        @endphp
                        <div class="relative w-full h-full" id="carousel-{{ $d->id }}" data-total="{{ count($fotos) }}">
                            @foreach ($fotos as $index => $foto)
                            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}">
                                <img src="{{ asset('storage/' . $foto) }}" alt="{{ $d->judul }}" class="w-full h-48 object-cover">
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Tombol Next dan Prev -->
                        <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded" onclick="prevSlide('{{ $d->id }}')">&#10094;</button>
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded" onclick="nextSlide('{{ $d->id }}')">&#10095;</button>
                    </div>
                    <div class="p-5">
                        <h2 class="mb-1 tracking-tight text-center font-bold">{{ $d->judul }}</h2>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $galeri->links('pagination::tailwind') }}
            </div>
        </div>
    </section>

    <!-- JavaScript untuk Navigasi Slideshow -->
    <script>
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
    </script>
</x-layout>






