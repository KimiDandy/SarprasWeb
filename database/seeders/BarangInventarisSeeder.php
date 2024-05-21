<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('baranginventaris')->insert([
            'nama_barang' => 'Obeng',
            'gambar_barang' => '/storage/gambar_barang/qwyCSxD20W3LzJmghIJZc1lErTlhIpC5l58gI0Vs.jpg',
        ]);

        DB::table('baranginventaris')->insert([
            'nama_barang' => 'Papan Tulis',
            'gambar_barang' => '/storage/gambar_barang/ci3KlQwKB96IvI5Qf1zpOmmhMkgqT2JJHxrc41AD.jpg',
        ]);
    }
}
