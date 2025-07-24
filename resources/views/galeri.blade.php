<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($galeri as $d)
                    <article class="w-full border rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:scale-[1.02]">
                        <div class="relative w-full aspect-video overflow-hidden">
                            @php
                                $fotos = is_array($d->foto) ? $d->foto : json_decode($d->foto, true);
                            @endphp
                            <div class="relative w-full h-full" id="carousel-{{ $d->id }}" data-total="{{ count($fotos) }}">
                                @foreach ($fotos as $index => $foto)
                                    <div class="absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}">
                                        <img 
                                            src="{{ asset('storage/' . $foto) }}" 
                                            alt="{{ $d->judul }}" 
                                            class="w-full h-full object-cover" 
                                            loading="lazy" 
                                            decoding="async"
                                        >
                                    </div>
                                @endforeach
                            </div>

                            <!-- Tombol Navigasi -->
                            <button 
                                class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 text-white px-2 py-1 rounded hover:bg-black/70 transition"
                                onclick="prevSlide('{{ $d->id }}')"
                                aria-label="Sebelumnya"
                            >&#10094;</button>
                            <button 
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 text-white px-2 py-1 rounded hover:bg-black/70 transition"
                                onclick="nextSlide('{{ $d->id }}')"
                                aria-label="Selanjutnya"
                            >&#10095;</button>
                        </div>
                        <div class="p-4">
                            <h2 class="text-center font-semibold text-gray-800">{{ $d->judul }}</h2>
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

    @push('scripts')
    <script defer>
        function nextSlide(id) {
            const container = document.getElementById(`carousel-${id}`);
            const slides = container.querySelectorAll("div.absolute");
            const total = parseInt(container.getAttribute("data-total"));
            let currentIndex = Array.from(slides).findIndex(slide => slide.classList.contains("opacity-100"));
            slides[currentIndex].classList.remove("opacity-100", "pointer-events-auto");
            slides[currentIndex].classList.add("opacity-0", "pointer-events-none");
            const nextIndex = (currentIndex + 1) % total;
            slides[nextIndex].classList.remove("opacity-0", "pointer-events-none");
            slides[nextIndex].classList.add("opacity-100", "pointer-events-auto");
        }

        function prevSlide(id) {
            const container = document.getElementById(`carousel-${id}`);
            const slides = container.querySelectorAll("div.absolute");
            const total = parseInt(container.getAttribute("data-total"));
            let currentIndex = Array.from(slides).findIndex(slide => slide.classList.contains("opacity-100"));
            slides[currentIndex].classList.remove("opacity-100", "pointer-events-auto");
            slides[currentIndex].classList.add("opacity-0", "pointer-events-none");
            const prevIndex = (currentIndex - 1 + total) % total;
            slides[prevIndex].classList.remove("opacity-0", "pointer-events-none");
            slides[prevIndex].classList.add("opacity-100", "pointer-events-auto");
        }
    </script>
    @endpush
</x-layout>
