<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <!-- Rutinitas Kegiatan Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Rutinitas Kegiatan Harian</h2>
            
            <!-- Jadwal Harian -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Senin -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Senin</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Hafalan Al-Quran (Tahfidz)</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Selasa -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Selasa</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Kajian Kitab Kuning</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Rabu -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Rabu</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Hafalan Al-Quran (Tahfidz)</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Kamis -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Kamis</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Kajian Kitab Kuning</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Jumat -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Jumat</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Kajian Akhlak</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Sabtu -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Sabtu</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>07:00 - 12:00:</strong> Belajar di Kelas</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Hafalan Al-Quran (Tahfidz)</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

                <!-- Minggu -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-4">Minggu</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><strong>04:30 - 06:00:</strong> Sholat Subuh & Pengajian Pagi</li>
                        <li><strong>09:00 - 11:00:</strong> Olahraga & Kegiatan Kreatif</li>
                        <li><strong>12:30 - 13:30:</strong> Sholat Dzuhur & Istirahat</li>
                        <li><strong>14:00 - 16:00:</strong> Kegiatan Sosial</li>
                        <li><strong>17:00 - 18:00:</strong> Sholat Maghrib & Kajian Kitab</li>
                        <li><strong>20:00 - 21:00:</strong> Sholat Isya & Pengajian Malam</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</x-layout>
