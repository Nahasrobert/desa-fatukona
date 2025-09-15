<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApbdesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('apbdesa')->truncate();
        DB::table('apbdesa')->insert([['tahun' => 2025, 'bidang' => 'Pembangunan', 'anggaran' => '500000000.00', 'realisasi' => '120000000.00', 'created_at' => '2025-08-22 08:09:48'], ['tahun' => 2025, 'bidang' => 'Pemberdayaan', 'anggaran' => '200000000.00', 'realisasi' => '50000000.00', 'created_at' => '2025-08-22 08:09:48'], ['tahun' => 2025, 'bidang' => 'Pembinaan', 'anggaran' => '150000000.00', 'realisasi' => '30000000.00', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
