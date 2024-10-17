<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
     <!-- Section Kurikulum Tahfidz dan Kitab -->
     <div class="mt-10">
        <h3 class="text-2xl font-semibold text-gray-800 text-center">Kurikulum Tahfidz dan Kitab</h3>
        <p class="mt-4 text-gray-600 text-center">
          Pondok Pesantren Darruh Rahmah memiliki kurikulum khusus yang memadukan hafalan Al-Qur'an (Tahfidz) dengan pengajaran kitab-kitab klasik (kitab kuning) untuk memperdalam pemahaman santri terhadap ajaran Islam yang menyeluruh.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
          <!-- Kurikulum Tahfidz -->
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h4 class="text-xl font-semibold text-gray-800">Program Tahfidz Al-Qur'an</h4>
            <p class="mt-4 text-gray-600">
              Program Tahfidz kami bertujuan untuk membimbing santri dalam menghafal Al-Qur'an 30 juz dengan bimbingan intensif. Selain hafalan, santri juga dibekali dengan pemahaman tafsir dan tajwid yang mendalam, agar mereka dapat mengamalkan Al-Qur'an dengan benar.
            </p>
            <ul class="mt-4 text-gray-600 list-disc list-inside">
              <li>Target Hafalan 30 Juz</li>
              <li>Bimbingan Harian oleh Ustadz/Ustadzah</li>
              <li>Pelajaran Tafsir dan Tajwid</li>
              <li>Program Muraja'ah (pengulangan hafalan)</li>
            </ul>
          </div>

          <!-- Kurikulum Kitab -->
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h4 class="text-xl font-semibold text-gray-800">Pengajaran Kitab Kuning</h4>
            <p class="mt-4 text-gray-600">
              Kami juga menyediakan pengajaran kitab kuning yang membahas berbagai bidang ilmu agama seperti fiqh, aqidah, akhlak, dan hadits. Santri diajarkan untuk memahami teks klasik ini dengan metode yang sistematis sehingga dapat mengembangkan wawasan keislaman mereka.
            </p>
            <ul class="mt-4 text-gray-600 list-disc list-inside">
              <li>Pelajaran Fiqh, Aqidah, dan Akhlak</li>
              <li>Kitab-kitab Karya Ulama Klasik</li>
              <li>Diskusi dan Studi Kritis</li>
              <li>Bimbingan oleh Para Kyai dan Ustadz Senior</li>
            </ul>
          </div>
        </div>
      </div>
</x-layout>