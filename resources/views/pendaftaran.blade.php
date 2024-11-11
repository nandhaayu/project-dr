<x-layout>
    <!-- Pendaftaran Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Pendaftaran Santri Baru</h1>
                <p class="text-gray-700 leading-relaxed">
                    Pondok Pesantren Darruh Rahmah membuka pendaftaran santri baru tahun ajaran 2024/2025. Segera daftarkan diri Anda dan jadilah bagian dari generasi yang berilmu, berakhlak, dan siap menghadapi tantangan zaman modern.
                </p>
            </div>
            @foreach ($pendaftaran as $d)
            <div class=" bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $d->judul }}</h2>
                <img src="{{ asset('assets/images/' . $d->foto) }}" alt="Pamflet Pendaftaran" class="w-full h-auto rounded-lg mb-6">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! $d->deskripsi !!}
                </p>
                <!-- Link Download Pamflet -->
                <div class="mt-6 text-center">
                    <a href="{{ route('pendaftaran.download', $d) }}" class="bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-600 transition duration-300">
                        Unduh Pamflet Pendaftaran
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>
