<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            @if ($posts->isEmpty())
                <p class="text-center text-gray-500 text-lg">Tidak ada hasil untuk "{{ $query }}".</p>
            @else
                <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Hasil Pencarian untuk "{{ $query }}"</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $d)
                        <article 
                            class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out">
                            <!-- Featured Image -->
                            <a href="{{ route('show.singlePost', $d->id) }}">
                                <img 
                                    src="{{ asset('assets/images/' . $d->image) }}" 
                                    alt="{{ $d['title'] }}" 
                                    class="w-full h-48 object-cover">
                            </a>
                            <div class="p-4">
                                <!-- Title -->
                                <a href="{{ route('show.singlePost', $d->id) }}">
                                    <h2 class="text-lg font-bold text-gray-800 hover:underline">{{ $d['title'] }}</h2>
                                </a>
                                <!-- Author and Date -->
                                <div class="text-gray-500 text-sm mt-2">
                                    Oleh 
                                    <a href="#" class="text-teal-500 hover:underline">{{ $d->author->name }}</a> 
                                    | {{ $d->created_at->format('j F Y') }}
                                </div>
                                <!-- Excerpt -->
                                <p class="text-gray-600 text-sm mt-4">
                                    {!! Illuminate\Support\Str::words(strip_tags($d->body), 25, '...') !!}
                                </p>
                                <!-- Read More -->
                                <a href="{{ route('show.singlePost', $d->id) }}" 
                                    class="inline-block mt-4 text-sm text-teal-600 hover:underline font-semibold">
                                    Selengkapnya &raquo;
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            @endif
        </div>
    </section>
</x-layout>
