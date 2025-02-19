<x-layout>
    <!-- Rutinitas Kegiatan Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Rutinitas Kegiatan Umum</h2>
                <p class="text-gray-700 leading-relaxed">
                    Pondok Pesantren Darur Rohmah tidak hanya menjadi pusat pendidikan bagi santri, tetapi juga aktif dalam berbagai kegiatan yang melibatkan masyarakat sekitar. Kegiatan-kegiatan ini bertujuan untuk mempererat hubungan antara pesantren dan masyarakat serta menanamkan nilai-nilai kebersamaan dan kepedulian sosial. Berikut adalah beberapa kegiatan umum yang rutin dilaksanakan:
                </p>
            </div>
            <!-- Jadwal Harian -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($rutinitas as $d)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-semibold text-teal-800 mb-4">{{ $d->judul }}</h3>
                    <p class="text-gray-600 space-y-2">
                        {!! $d->deskripsi !!}
                    </p>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-layout>
