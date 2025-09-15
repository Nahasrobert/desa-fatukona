<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BantuanPenerimaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bantuan_penerima')->truncate();
        DB::table('bantuan_penerima')->insert([['id_jenis' => 1, 'id_penduduk' => 2, 'periode' => '2025-07', 'status' => 'Dicairkan', 'jumlah' => '300000.00', 'keterangan' => 'Triwulan II', 'created_at' => '2025-08-22 08:09:49'], ['id_jenis' => 1, 'id_penduduk' => 1, 'periode' => '2025-07', 'status' => 'Disetujui', 'jumlah' => '300000.00', 'keterangan' => 'Triwulan II', 'created_at' => '2025-08-22 08:09:49'], ['id_jenis' => 2, 'id_penduduk' => 5, 'periode' => '2025-07', 'status' => 'Disetujui', 'jumlah' => '0.00', 'keterangan' => 'Tahap Juli 2025', 'created_at' => '2025-08-22 08:09:49'], ['id_jenis' => 3, 'id_penduduk' => 7, 'periode' => '2025-07', 'status' => 'Dicairkan', 'jumlah' => '200000.00', 'keterangan' => 'Bantuan pangan Juli', 'created_at' => '2025-08-22 08:09:49']]);
    }
}
