<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SotkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sotk')->truncate();
        DB::table('sotk')->insert([['nama_jabatan' => 'Kepala Desa', 'atasan_id' => NULL, 'urutan' => 1, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Sekretaris Desa', 'atasan_id' => 1, 'urutan' => 2, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Kaur Keuangan', 'atasan_id' => 2, 'urutan' => 3, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Kaur Umum', 'atasan_id' => 2, 'urutan' => 4, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Kasi Pemerintahan', 'atasan_id' => 2, 'urutan' => 5, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Kasi Kesejahteraan', 'atasan_id' => 2, 'urutan' => 6, 'created_at' => '2025-08-22 08:09:48'], ['nama_jabatan' => 'Kasi Pelayanan', 'atasan_id' => 2, 'urutan' => 7, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
