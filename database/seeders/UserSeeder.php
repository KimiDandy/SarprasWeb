<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'Siswa',
            'username' => '111',
            'password' => '111',
        ]);

        DB::table('users')->insert([
            'role' => 'Toolman',
            'username' => '222',
            'password' => '222',
        ]);

        DB::table('users')->insert([
            'role' => 'Siswa',
            'username' => '333',
            'password' => '333',
        ]);

        DB::table('users')->insert([
            'role' => 'Siswa',
            'username' => '444',
            'password' => '444',
        ]);
    }
}
