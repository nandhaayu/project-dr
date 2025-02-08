<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($galeri as $d)
                <article class="w-full mx-auto border rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <!-- Featured Image -->
                    <a href="#">
                        <img src="{{ asset('assets/images/' . $d->foto) }}" alt="{{ $d['judul'] }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-5">
                        <!-- Title -->
                        <a href="#">
                            <h2 class="mb-1 tracking-tight text-center font-bold hover:underline">{{ $d['judul'] }}</h2>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
