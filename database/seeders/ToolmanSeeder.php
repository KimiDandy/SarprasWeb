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
            'jurusan' => 'TKJ',
            'id_user' => 1, 
        ]);

        DB::table('toolmans')->insert([
            'nama' => 'Moja',
            'nomor_hp' => '085210035588',
            'jurusan' => 'Otomotif',
            'id_user' => 2,
        ]);
    }
}
