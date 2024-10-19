<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($posts as $post)
                <article class="max-w-md mx-auto border rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <!-- Featured Image -->
                    <a href="/posts/{{ $post['slug'] }}">
                        <img src="assets/img/banner-1.jpg" alt="{{ $post['title'] }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <!-- Title -->
                        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                            <h2 class="mb-1 text-2xl tracking-tight font-bold text-green-800">{{ $post['title'] }}</h2>
                        </a>
                        <!-- Author and Date -->
                        <div class="text-gray-500 text-sm mb-4">
                            By 
                            <a href="/authors/{{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a> 
                            | {{ $post->created_at->format('j F Y') }}
                        </div>
                        <!-- Excerpt -->
                        <p class="text-gray-700 font-light">{{ Str::limit($post['body'], 100) }}</p>
                        <!-- Read More -->
                        <a href="/posts/{{ $post['slug'] }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">Read more &raquo;</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        {{-- <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Kurikulum Tahfidz dan Kajian Kitab</h1>
                <p class="text-gray-700 leading-relaxed">
                    Pondok Pesantren Darruh Rahmah memfokuskan kurikulumnya pada dua aspek utama, yaitu program Tahfidzul Qur'an dan pembelajaran Kitab Kuning. Kedua program ini bertujuan membentuk santri yang hafidz Al-Qur'an serta memiliki pemahaman agama yang mendalam melalui kajian kitab-kitab klasik.
                </p>
            </div>
    
            <!-- Grid untuk Program Tahfidz dan Kajian Kitab -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- Program Tahfidz -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="assets/img/banner-tahfidz.jpg" alt="Program Tahfidz" class="w-full h-auto rounded-lg mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Tahfidz Al-Qur'an</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Program Tahfidz Pondok Pesantren Darruh Rahmah bertujuan mencetak santri yang mampu menghafal Al-Qur'an 30 juz dengan pemahaman tajwid dan makhraj yang benar. Santri diberikan bimbingan intensif oleh para ustadz yang berkompeten, memastikan setiap santri dapat mencapai target hafalan sesuai dengan kemampuan mereka.
                    </p>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Metode yang digunakan dalam program ini meliputi tasmi' (memperdengarkan hafalan), muraja'ah (mengulang hafalan), dan tafsir Al-Qur'an agar santri tidak hanya hafal, tetapi juga memahami isi kandungan Al-Qur'an.
                    </p>
                </div>
    
                <!-- Kajian Kitab Kuning -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="assets/img/banner-kitab.jpg" alt="Kajian Kitab Kuning" class="w-full h-auto rounded-lg mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Kajian Kitab Kuning</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Kajian Kitab Kuning merupakan salah satu program unggulan di Pondok Pesantren Darruh Rahmah. Santri mempelajari berbagai kitab klasik karya ulama salaf, mencakup ilmu fiqih, aqidah, tasawuf, nahwu, dan sharaf. Program ini bertujuan membekali santri dengan pengetahuan agama yang mendalam dan kemampuan untuk memahami teks-teks keislaman dengan baik.
                    </p>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Kitab-kitab yang diajarkan antara lain seperti "Fathul Mu'in" dalam bidang fiqih, "Al-Aqidah Al-Tahawiyyah" dalam aqidah, dan "Talimul Mutaallim" yang menjadi panduan adab menuntut ilmu. Kajian ini diajarkan secara bertahap sesuai dengan tingkat pemahaman santri.
                    </p>
                </div>
                
            </div>
        </div> --}}
    </section>
</x-layout>
