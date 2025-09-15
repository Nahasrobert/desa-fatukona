<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratCounterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('surat_counter')->truncate();
        DB::table('surat_counter')->insert([['id_template' => 1, 'tahun' => 2025, 'bulan' => 8, 'last_no' => 2], ['id_template' => 2, 'tahun' => 2025, 'bulan' => 8, 'last_no' => 1]]);
    }
}
