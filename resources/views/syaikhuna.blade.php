<x-layout>
    <!-- Biografi Section -->
    <section class="py-12 bg-gray-100">
        @foreach ($syaikhuna as $d)
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar Syaikhuna -->
                <div class="lg:w-1/3 bg-white p-6 rounded-lg shadow-lg">
                    <img loading="lazy" src="{{ asset('storage/' . $d->foto) }}" alt="Foto Syaikhuna" class="w-full h-auto rounded-lg mb-2">
                    <p class="text-gray-700 text-center font-semibold mb-2">{{ $d->nama ?? 'Nama Foto' }}</p>
                </div>

                <!-- Right: Biografi Syaikhuna -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg text-justify">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                    <p class="text-gray-700 w-full mb-4">
                        {!! $d->deskripsi !!}
                    </p>                    
                </div>
            </div>
        </div>
        @endforeach
    </section>
</x-layout>