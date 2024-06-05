<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '1',
            'id_barang' => '2',
            'id_seribarang' => '6',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '1',
            'id_barang' => '2',
            'id_seribarang' => '7',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '2',
            'id_barang' => '1',
            'id_seribarang' => '1',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '2',
            'id_barang' => '1',
            'id_seribarang' => '2',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '2',
            'id_barang' => '1',
            'id_seribarang' => '3',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '3',
            'id_barang' => '2',
            'id_seribarang' => '8',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '3',
            'id_barang' => '3',
            'id_seribarang' => '9',
        ]);

        DB::table('detailpeminjamans')->insert([
            'id_peminjaman' => '3',
            'id_barang' => '3',
            'id_seribarang' => '10',
        ]);
    }
}
