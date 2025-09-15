<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PkkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pkk')->truncate();
        DB::table('pkk')->insert([['nama' => 'Siti Aisyah', 'jabatan' => 'Ketua', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Lina Marlina', 'jabatan' => 'Sekretaris', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama' => 'Wulan Ayu', 'jabatan' => 'Bendahara', 'periode' => '2021-2027', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
