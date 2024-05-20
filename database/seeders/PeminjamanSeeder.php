<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjamans')->insert([
            'tanggal_pinjam' => '2024-05-20',
            'tanggal_kembali' => '2024-05-21',
            'status_perizinan' => 'Menunggu',
            'status_peminjaman' => null,
            'id_user' => 1,
        ]);

        DB::table('peminjamans')->insert([
            'tanggal_pinjam' => '2024-05-20',
            'tanggal_kembali' => '2024-05-21',
            'status_perizinan' => 'Menunggu',
            'status_peminjaman' => null,
            'id_user' => 3,
        ]);

        DB::table('peminjamans')->insert([
            'tanggal_pinjam' => '2024-05-20',
            'tanggal_kembali' => '2024-05-22',
            'status_perizinan' => 'Menunggu',
            'status_peminjaman' => null,
            'id_user' => 4,
        ]);
    }
}
