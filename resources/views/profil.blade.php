<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar dan Deskripsi -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                    <img src="assets/img/banner-1.jpg" alt="Foto Pondok Pesantren Darruh Rahmah" class="w-full h-auto rounded-lg mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang Pondok Pesantren Darruh Rahmah</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Pondok Pesantren Darruh Rahmah merupakan lembaga pendidikan Islam yang berfokus pada pengembangan ilmu agama, hafalan Al-Qur'an, dan kajian kitab kuning. Dengan suasana yang sejuk dan asri, pondok ini menyediakan lingkungan yang kondusif untuk belajar dan beribadah.
                    </p>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Darruh Rahmah didirikan pada tahun 1990 dengan tujuan mencetak generasi yang berakhlak mulia, hafidz Al-Qur'an, dan berpengetahuan luas. Berbagai program unggulan seperti Tahfidzul Qur'an, kajian Kitab Kuning, dan kegiatan ekstrakurikuler disiapkan untuk para santri agar seimbang dalam ilmu, ibadah, dan kehidupan sosial.
                    </p>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Selain pendidikan agama, santri juga mendapatkan ilmu umum yang terintegrasi, mempersiapkan mereka untuk menghadapi tantangan masa depan dengan pondasi akhlak dan ilmu yang kuat.
                    </p>
                </div>

                <!-- Right: Berita Terbaru -->
                <div class="lg:w-1/3">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Berita Terbaru</h3>
                    <div class="space-y-6">
                        <!-- Berita 1 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img src="assets/img/banner-1.jpg" alt="Berita 1" class="w-full h-32 object-cover rounded-lg mb-3">
                            <h4 class="text-xl font-semibold text-gray-800">Kegiatan Haflah Akhir Tahun</h4>
                            <p class="text-gray-600 text-sm mt-2">
                                Pondok Pesantren Darruh Rahmah baru saja menggelar Haflah Akhir Tahun yang dihadiri oleh wali santri dan tokoh masyarakat. Acara ini diisi dengan penampilan para santri yang telah menyelesaikan hafalan Al-Qur'an 30 juz.
                            </p>
                            <a href="#" class="text-teal-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>

                        <!-- Berita 2 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img src="assets/img/banner-1.jpg" alt="Berita 2" class="w-full h-32 object-cover rounded-lg mb-3">
                            <h4 class="text-xl font-semibold text-gray-800">Penerimaan Santri Baru 2024</h4>
                            <p class="text-gray-600 text-sm mt-2">
                                Pendaftaran santri baru Pondok Pesantren Darruh Rahmah telah dibuka untuk tahun ajaran 2024. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan agama dan akademik berkualitas.
                            </p>
                            <a href="#" class="text-teal-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>

                        <!-- Berita 3 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <img src="assets/img/banner-1.jpg" alt="Berita 3" class="w-full h-32 object-cover rounded-lg mb-3">
                            <h4 class="text-xl font-semibold text-gray-800">Prestasi Santri dalam Lomba Tahfidz</h4>
                            <p class="text-gray-600 text-sm mt-2">
                                Alhamdulillah, santri Darruh Rahmah berhasil meraih juara 1 dalam lomba Tahfidz Nasional. Ini adalah bukti nyata kualitas pendidikan dan bimbingan yang diberikan di pondok kami.
                            </p>
                            <a href="#" class="text-teal-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>