<x-layout>
    <!-- Biografi Section -->
    <section class="py-12 bg-gray-100">
        @foreach ($syaikhuna as $d)
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar Syaikhuna -->
                <div class="lg:w-1/3 bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('storage/' . $d->foto) }}" alt="Foto Syaikhuna" class="w-full h-auto rounded-lg mb-2">
                    <p class="text-gray-700 text-center font-semibold mb-2">{{ $d->nama ?? 'Nama Foto' }}</p>
                </div>

                <!-- Right: Biografi Syaikhuna -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg text-justify">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                    <p class="text-gray-700 w-full mb-4">
                        {!! $d->deskripsi !!}
                    </p>                    
                    <!-- Quotes dari Syaikhuna -->
                    {{-- <blockquote class="mt-8 bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 italic rounded-lg">
                        "Ilmu itu cahaya, dan cahaya tidak akan masuk ke dalam hati yang dipenuhi dengan kegelapan dunia. Bersihkan hati, fokuskan diri untuk mencari ilmu, dan amalkan setiap ilmu yang didapat."
                    </blockquote> --}}
                </div>
            </div>
        </div>
        @endforeach
    </section>
</x-layout>