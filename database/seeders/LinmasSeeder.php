<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinmasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('linmas')->truncate();
        DB::table('linmas')->insert([['nama' => 'Slamet Riyadi', 'jabatan' => 'Komandan', 'periode' => '2021-2027', 'foto' => NULL, 'kontak' => '081200000012', 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Eko Prasetyo', 'jabatan' => 'Anggota', 'periode' => '2021-2027', 'foto' => NULL, 'kontak' => '081200000013', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
