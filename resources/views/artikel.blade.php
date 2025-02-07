<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($post as $d)
                <article class="w-full mx-auto border rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <!-- Featured Image -->
                    <a href="{{ route('show.singlePost', $d->id) }}}}">
                        <img src="{{ asset('assets/images/' . $d->image) }}" alt="{{ $d['title'] }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-5">
                        <!-- Title -->
                        <a href="{{ route('show.singlePost', $d->id) }}">
                            <h2 class="mb-1 tracking-tight font-bold hover:underline">{{ $d['title'] }}</h2>
                        </a>
                        <!-- Author and Date -->
                        <div class="text-gray-500 text-sm mb-4">
                            By 
                            <a href="#" class="hover:underline">{{ $d->author->name }}</a> 
                            | {{ $d->created_at->format('j F Y') }}
                        </div>
                        <!-- Excerpt -->
                        <p class="text-gray-700 font-light text-sm">{!! Illuminate\Support\Str::words(strip_tags($d->body), 25, '...') !!}</p>
                        <!-- Read More -->
                        <a href="{{ route('show.singlePost', $d->id) }}" class="mt-4 text-sm inline-block text-green-500 hover:underline">Read more &raquo;</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
