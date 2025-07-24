<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($post as $d)
                    <article class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                        <!-- Gambar dengan Lazy Load -->
                        <a href="{{ route('show.singlePost', $d->id) }}">
                            <img 
                                src="{{ asset('storage/' . $d->image) }}" 
                                alt="{{ $d->title }}" 
                                class="w-full h-48 object-cover"
                                loading="lazy"
                            >
                        </a>
                        <div class="p-4">
                            <!-- Judul -->
                            <a href="{{ route('show.singlePost', $d->id) }}">
                                <h2 class="text-lg font-semibold mb-2 hover:underline line-clamp-2">
                                    {{ $d->title }}
                                </h2>
                            </a>
                            <!-- Penulis & Tanggal -->
                            <div class="text-gray-500 text-sm mb-3">
                                Oleh <span class="font-medium">{{ $d->author->name }}</span> | {{ $d->created_at->format('j F Y') }}
                            </div>
                            <!-- Kutipan -->
                            <p class="text-gray-700 text-sm text-justify leading-relaxed">
                                {!! \Illuminate\Support\Str::words(strip_tags($d->body), 25, '...') !!}
                            </p>
                            <!-- Link Selengkapnya -->
                            <a href="{{ route('show.singlePost', $d->id) }}" class="inline-block mt-4 text-green-600 text-sm font-medium hover:underline">
                                Baca Selengkapnya &raquo;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Navigasi Pagination -->
            <div class="mt-10 flex justify-center">
                {{ $post->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
</x-layout>
