<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar dan Deskripsi -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post['title'] }}" class="w-full object-cover rounded-lg mb-3" style="max-height: 400px">
                        <div class="p-6 text-justify">
                            <h2 class="mb-2 text-2xl tracking-tight font-bold">{{ $post['title'] }}</h2>
                            <div class="mb-2 text-gray-500">
                                By 
                                <a href="#" class="text-base hover:underline">{{ $post->author->name }}</a> 
                                | {{ $post->created_at->format('j F Y') }}
                            </div>
                            <p class="text-gray-700 font-light leading-relaxed mb-2">{!! $post->body !!}</p>
                            <a href="/artikel" class="font-medium text-green-500 hover:underline mt-4">&laquo; Kembali Ke Artikel</a>
                        </div>
                </div>

                <!-- Right: Berita Terbaru -->
                <div class="lg:w-1/3">
                    <h3 class="font-semibold text-gray-900 mb-4">Berita Terbaru</h3>
                    <div class="space-y-6">
                        <!-- Berita 1 -->
                        @foreach ($posts as $d)
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img src="{{ asset('storage/' . $d->image) }}" alt="Berita 1" class="w-full h-44 object-cover rounded-lg mb-3">
                            <h3 class="font-semibold text-gray-800">{{ $d->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2 text-justify">
                                {!! Illuminate\Support\Str::words(strip_tags($d->body), 10, '...') !!}
                            </p>
                            <a href="{{ route('show.singlePost', $d->id) }}" class="text-green-500 hover:underline text-sm mt-2">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>