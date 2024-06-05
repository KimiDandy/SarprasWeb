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
            'gambar_barang' => 'storage/gambar_barang/5idSPQ8Dayj9dSjiuF438uCzwod7oSlHWMBrBJB4.jpg',
            'jurusan' => 'Otomotif',
        ]);

        DB::table('baranginventaris')->insert([
            'nama_barang' => 'Spidol',
            'gambar_barang' => 'storage/gambar_barang/HWLUyrmUSGIlIcgtW55ZzbCvqDGe5Y9S84shgs1D.jpg',
            'jurusan' => 'TKJ',
        ]);

        DB::table('baranginventaris')->insert([
            'nama_barang' => 'Kabel',
            'gambar_barang' => 'storage/gambar_barang/Vs8KINivgTmoaLsiGUdu2cT6PJOfnPj7su392w9b.jpg',
            'jurusan' => 'TKJ',
        ]);
    }
}
