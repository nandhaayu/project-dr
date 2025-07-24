<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar dan Deskripsi -->
                @if ($profil)
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg text-justify">
                    <img  loading="lazy" src="{{ asset('storage/'. $profil->foto) }}" alt="Foto Pondok Pesantren Darruh Rahmah" class="w-full rounded-lg mb-6" style="object-position: center; object-fit:cover; max-height: 400px">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $profil->judul }}</h2>
                    <p class="text-gray-700 leading-relaxed text-justify">
                        {!! $profil->deskripsi !!}
                    </p>
                </div>
                @endif
                <!-- Right: Berita Terbaru -->
                <div class="lg:w-1/3">
                    <h3 class="font-semibold text-gray-900 mb-4">Berita Terbaru</h3>
                    <div class="space-y-6">
                        <!-- Berita 1 -->
                        @foreach ($posts as $d)
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img loading="lazy" src="{{ asset('storage/' . $d->image) }}" alt="Berita 1" class="w-full h-44 object-cover rounded-lg mb-3">
                            <h3 class="font-semibold text-gray-800">{{ $d->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2 text-justify">
                                {!! Illuminate\Support\Str::words(strip_tags($d->body), 10, '...') !!}
                            </p>
                            <a href="{{ route('show.singlePost' , $d->id) }}" class="text-green-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>