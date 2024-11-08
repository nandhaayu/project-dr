<x-layout>
    <!-- Rutinitas Kegiatan Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Rutinitas Kegiatan Harian</h2>
            
            <!-- Jadwal Harian -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($rutinitas as $d)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">{{ $d->judul }}</h3>
                    <p class="text-gray-600 space-y-2">
                        {!! $d->deskripsi !!}
                    </p>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-layout>
