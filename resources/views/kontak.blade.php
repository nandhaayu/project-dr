<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  <!-- Map Section -->
<section class="py-12">
  <div class="max-w-6xl mx-auto px-4">
      <h3 class="text-2xl font-semibold text-center text-gray-900 mb-8">Lokasi Kami</h3>
      <div class="w-full h-64">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.83007258968!2d107.61912221559616!3d-6.917463094937412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e633eaf034d7%3A0x52b7c7d3e77aa0e1!2sPondok+Pesantren!5e0!3m2!1sen!2sid!4v1600000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
  </div>
</section>

  <!-- Contact Section -->
  <section class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        {{-- <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Hubungi Kami</h2> --}}
        
        <!-- Informasi Kontak -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Alamat -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Alamat</h3>
                <p class="text-gray-600">Jl. Pesantren No.123, Desa Rahmah, Kec. Damai, Jawa Timur</p>
            </div>

            <!-- Telepon -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Telepon</h3>
                <p class="text-gray-600">(021) 1234 5678</p>
            </div>

            <!-- Email -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Email</h3>
                <p class="text-gray-600">info@darrurrahmah.sch.id</p>
            </div>

            <!-- Jam Operasional -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Jam Operasional</h3>
                <p class="text-gray-600">Senin - Jumat: 08.00 - 16.00</p>
                <p class="text-gray-600">Sabtu: 09.00 - 13.00</p>
            </div>
        </div>
    </div>
</section>
</x-layout>
