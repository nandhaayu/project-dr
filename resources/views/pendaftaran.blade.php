<x-layout>
    <!-- Pendaftaran Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Pendaftaran Santri Baru</h2>
                <p class="text-gray-700 leading-relaxed">
                    Pondok Pesantren Darur Rahmah membuka pendaftaran santri baru. Segera daftarkan diri Anda dan jadilah bagian dari generasi yang berilmu, berakhlak, dan siap menghadapi tantangan zaman modern.
                </p>
            </div>
            @foreach ($pendaftaran as $d)
            <div class=" bg-white p-6 rounded-lg shadow-lg">
                <h3 class="font-bold text-gray-900 mb-4">{{ $d->judul }}</h3>
                <img src="{{ asset('storage/' . $d->foto) }}" alt="Pamflet Pendaftaran" class="w-full h-auto rounded-lg mb-6">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! $d->deskripsi !!}
                </p>
                <!-- Link Download Pamflet -->
                <div class="mt-6 text-center">
                    <a href="{{ route('pendaftaran.download', $d->id) }}" class="bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-600 transition duration-300">
                        Unduh Pamflet Pendaftaran
                    </a>
                </div>                
            </div>
            @endforeach
        </div>
    </section>
</x-layout>
