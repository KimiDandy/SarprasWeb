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
            'nisn' => '123123123',
            'nama' => 'Kimi',
            'kelas' => 'XII TKJ',
            'nomor_hp' => '085210035577',
            'jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'id_user' => 1, // User 1 (Siswa)
        ]);
    }
}
