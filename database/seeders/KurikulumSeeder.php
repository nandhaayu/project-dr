<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurikulums')->insert([
            'judul' => 'Program Tahfidz Al-Quran',
            'deskripsi' => 'Program Tahfidz Pondok Pesantren Darruh Rahmah bertujuan mencetak santri yang mampu menghafal Al-Quran 30 juz dengan pemahaman tajwid dan makhraj yang benar. Santri diberikan bimbingan intensif oleh para ustadz yang berkompeten, 
            memastikan setiap santri dapat mencapai target hafalan sesuai dengan kemampuan mereka.Metode yang digunakan dalam program ini meliputi tasmi (memperdengarkan hafalan), murajaah (mengulang hafalan), dan tafsir Al-Quran agar santri tidak hanya hafal, tetapi juga memahami isi kandungan Al-Quran.',
            'foto' => null
        ],
        [
           'judul' => 'Kajian Kitab Kuning',
            'deskripsi' => 'Kajian Kitab Kuning merupakan salah satu program unggulan di Pondok Pesantren Darruh Rahmah. Santri mempelajari berbagai kitab klasik karya ulama salaf, mencakup ilmu fiqih, aqidah, tasawuf, nahwu, dan sharaf. Program ini bertujuan membekali santri dengan pengetahuan agama yang mendalam dan kemampuan untuk memahami teks-teks keislaman dengan baik.
            Kitab-kitab yang diajarkan antara lain seperti "Fathul Muin" dalam bidang fiqih, Al-Aqidah Al-Tahawiyyah dalam aqidah, dan Talimul Mutaallim yang menjadi panduan adab menuntut ilmu. Kajian ini diajarkan secara bertahap sesuai dengan tingkat pemahaman santri.',
            'foto' => null 
        ],
        [
            'judul' => 'Kurikulum Kejar Paket',
             'deskripsi' => 'Kurikulum Kejar Paket di Pondok Pesantren Darruh Rahmah memberikan kesempatan bagi santri yang ingin melanjutkan pendidikan formalnya melalui jalur non-formal. Program ini mencakup Kejar Paket A (setara SD), Paket B (setara SMP), dan Paket C (setara SMA).
             Dengan bimbingan dari guru-guru berpengalaman, santri dapat mengejar pendidikan formal mereka tanpa harus meninggalkan pendidikan agama. Kurikulum ini disusun sedemikian rupa agar santri bisa mengikuti ujian negara yang diakui, sehingga mendapatkan ijazah yang setara dengan sekolah formal.
             Selain itu, Pondok Pesantren juga memberikan dukungan tambahan dalam bentuk kelas pengayaan untuk memastikan santri mendapatkan pemahaman yang optimal dalam setiap mata pelajaran yang diujikan.',
             'foto' => null 
         ]

        );
    }
}
