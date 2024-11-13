<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar dan Deskripsi -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                    @foreach ($profil as $d)
                    <img src="{{ asset('assets/images/'. $d->foto) }}" alt="Foto Pondok Pesantren Darruh Rahmah" class="w-full h-auto rounded-lg mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {!! $d->deskripsi !!}
                    </p>
                    @endforeach
                </div>

                <!-- Right: Berita Terbaru -->
                <div class="lg:w-1/3">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Berita Terbaru</h3>
                    <div class="space-y-6">
                        <!-- Berita 1 -->
                        @foreach ($posts as $d)
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img src="{{ asset('assets/images/' . $d->image) }}" alt="Berita 1" class="w-full h-32 object-cover rounded-lg mb-3">
                            <h4 class="text-xl font-semibold text-gray-800">{{ $d->title }}</h4>
                            <p class="text-gray-600 text-sm mt-2">
                                {!! Illuminate\Support\Str::words(strip_tags($d->body), 10, '...') !!}
                            </p>
                            <a href="{{ route('show.singlePost' , $d->id) }}" class="text-teal-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>