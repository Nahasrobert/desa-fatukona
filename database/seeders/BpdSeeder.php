<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BpdSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bpd')->truncate();
        DB::table('bpd')->insert([['nama' => 'Rahmat Hidayat', 'jabatan' => 'Ketua', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Nurul Aini', 'jabatan' => 'Wakil Ketua', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Agus Salim', 'jabatan' => 'Anggota', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
