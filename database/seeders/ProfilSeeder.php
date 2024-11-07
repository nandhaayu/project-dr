<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profils')->insert([
            'judul' => 'Tentang Pondok Pesantren Daarur Rahmah',
            'deskripsi' => 'Pondok Pesantren Darruh Rahmah merupakan lembaga pendidikan Islam yang berfokus pada pengembangan ilmu agama, hafalan Al-Quran, dan kajian kitab kuning. Dengan suasana yang sejuk dan asri, pondok ini menyediakan lingkungan yang kondusif untuk belajar dan beribadah.',
            'foto' => null
        ]);
    }
}
