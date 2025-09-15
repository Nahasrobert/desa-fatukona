<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemerintahDesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pemerintah_desa')->truncate();
        DB::table('pemerintah_desa')->insert([['nama' => 'ASMIARTI', 'jabatan' => 'Kepala Desa', 'periode' => '2021-2027', 'foto' => NULL, 'kontak' => '081200000002', 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Supriyadi', 'jabatan' => 'Sekretaris Desa', 'periode' => '2021-2027', 'foto' => NULL, 'kontak' => '081200000010', 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Fitriani', 'jabatan' => 'Kaur Keuangan', 'periode' => '2021-2027', 'foto' => NULL, 'kontak' => '081200000011', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
