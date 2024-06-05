<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('siswas')->insert([
            'nisn' => '1111',
            'nama' => 'Kimi Dandy',
            'kelas' => 'XII',
            'nomor_hp' => '085210035577',
            'jurusan' => 'TKJ',
            'id_user' => 3,
        ]);

        DB::table('siswas')->insert([
            'nisn' => '2222',
            'nama' => 'Ariz Saputra',
            'kelas' => 'XI',
            'nomor_hp' => '085210035578',
            'jurusan' => 'Otomotif',
            'id_user' => 4,
        ]);

        DB::table('siswas')->insert([
            'nisn' => '3333',
            'nama' => 'Hairul Anam',
            'kelas' => 'X',
            'nomor_hp' => '085210035579',
            'jurusan' => 'TKJ',
            'id_user' => 5,
        ]);
    }
}
