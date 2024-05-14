<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriBarangInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('seribaranginventaris')->insert([
            'nomor_seri' => '101',
            'merk' => 'Tekiro',
            'status' => 'Tersedia',
            'id_barang' => '1',
        ]);

        DB::table('seribaranginventaris')->insert([
            'nomor_seri' => '102',
            'merk' => 'Tekiro',
            'status' => 'Tersedia',
            'id_barang' => '1',
        ]);

        DB::table('seribaranginventaris')->insert([
            'nomor_seri' => '103',
            'merk' => 'Facom',
            'status' => 'Tersedia',
            'id_barang' => '1',
        ]);

        DB::table('seribaranginventaris')->insert([
            'nomor_seri' => '201',
            'merk' => 'Joyko',
            'status' => 'Tersedia',
            'id_barang' => '2',
        ]);

        DB::table('seribaranginventaris')->insert([
            'nomor_seri' => '202',
            'merk' => 'Joyko',
            'status' => 'Tersedia',
            'id_barang' => '2',
        ]);
    }
}
