<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statistik')->truncate();
        DB::table('statistik')->insert([['kategori' => 'umur', 'label' => '0-5', 'jumlah' => 120, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48'], ['kategori' => 'umur', 'label' => '6-12', 'jumlah' => 210, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48'], ['kategori' => 'pendidikan', 'label' => 'SD', 'jumlah' => 350, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48'], ['kategori' => 'pendidikan', 'label' => 'SMA', 'jumlah' => 220, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48'], ['kategori' => 'pekerjaan', 'label' => 'Petani', 'jumlah' => 180, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48'], ['kategori' => 'agama', 'label' => 'Islam', 'jumlah' => 980, 'tahun' => 2025, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
