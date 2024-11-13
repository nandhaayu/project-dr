<x-layout>
  <!-- Map Section -->
@if ($kontak)
<section class="py-12">
  <div class="max-w-6xl mx-auto px-4">
      <h3 class="text-2xl font-semibold text-center text-gray-900 mb-8">Lokasi Kami</h3>
      <div class="w-full h-64">
          <iframe src="{{ $kontak->link_maps }}" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
  </div>
</section>

  <!-- Contact Section -->
  <section class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">       
        <!-- Informasi Kontak -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Alamat -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Alamat</h3>
                <p class="text-gray-600">{!! $kontak->alamat !!}</p>
            </div>

            <!-- Telepon -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Telepon</h3>
                <p class="text-gray-600">{!! $kontak->telepon !!}</p>
            </div>

            <!-- Email -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Email</h3>
                <p class="text-gray-600">{{ $kontak->email }}</p>
            </div>

            <!-- Jam Operasional -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Jam Operasional</h3>
                <p class="text-gray-600">{!! $kontak->jam !!}</p>
            </div>
        </div>
    </div>
</section>
@endif
</x-layout>
