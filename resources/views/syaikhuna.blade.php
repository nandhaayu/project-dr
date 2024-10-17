<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <!-- Biografi Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left: Gambar Syaikhuna -->
                <div class="lg:w-1/3 bg-white p-6 rounded-lg shadow-lg">
                    <img src="assets/img/org-1.jpg" alt="Foto Syaikhuna" class="w-full h-auto rounded-lg mb-6">
                </div>

                <!-- Right: Biografi Syaikhuna -->
                <div class="lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Biografi Syaikhuna</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        <strong>Syaikhuna</strong> adalah sosok ulama besar yang dikenal luas dalam dunia pendidikan Islam, khususnya di Indonesia. Beliau lahir di sebuah desa kecil di Jawa Timur dan sejak usia muda sudah menunjukkan kecerdasan luar biasa dalam memahami Al-Qur'an dan Hadits. Setelah menamatkan pendidikan dasar di tanah kelahirannya, Syaikhuna melanjutkan pendidikan ke berbagai pesantren ternama.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Di usia yang masih belia, Syaikhuna telah menyelesaikan hafalan Al-Qur'an dan melanjutkan studinya ke Timur Tengah. Di sana, beliau menimba ilmu dari para ulama besar dan mendapatkan banyak sanad dalam berbagai bidang ilmu, termasuk tafsir, hadits, fiqh, dan tasawuf. Pengalaman belajar di berbagai tempat ini membentuk keilmuan dan akhlak Syaikhuna yang sangat mendalam.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Setelah kembali ke Indonesia, Syaikhuna mendirikan Pondok Pesantren Darruh Rahmah dengan visi mencetak generasi yang berilmu, berakhlak, dan berjiwa pemimpin. Beliau sangat menekankan pentingnya menghafal Al-Qur'an dan memahami kitab-kitab klasik untuk menghadapi tantangan zaman modern. Hingga kini, Syaikhuna terus aktif mengajar, memberikan tausiyah, dan membimbing para santri dengan penuh keikhlasan.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Di samping kesibukannya sebagai pimpinan pondok, Syaikhuna juga aktif di berbagai kegiatan dakwah, baik di dalam maupun luar negeri. Beliau kerap diundang untuk memberikan ceramah dan menjadi narasumber dalam berbagai forum keislaman, menyebarkan pesan damai dan moderat Islam kepada umat.
                    </p>

                    <!-- Quotes dari Syaikhuna -->
                    <blockquote class="mt-8 bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 italic rounded-lg">
                        "Ilmu itu cahaya, dan cahaya tidak akan masuk ke dalam hati yang dipenuhi dengan kegelapan dunia. Bersihkan hati, fokuskan diri untuk mencari ilmu, dan amalkan setiap ilmu yang didapat."
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
</x-layout>