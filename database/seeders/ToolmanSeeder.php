<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('toolmans')->insert([
            'nama' => 'Mogi',
            'nomor_hp' => '085210035588',
            'jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'id_user' => 2, // User 2 (Toolman)
        ]);
    }
}
