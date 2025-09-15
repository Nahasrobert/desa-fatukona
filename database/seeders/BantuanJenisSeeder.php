<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BantuanJenisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bantuan_jenis')->truncate();
        DB::table('bantuan_jenis')->insert([['nama_bantuan' => 'BLT-DD', 'sumber_dana' => 'Dana Desa', 'kriteria' => 'KPM miskin ekstrem, terdampak ekonomi', 'keterangan' => 'Bantuan tunai dana desa', 'created_at' => '2025-08-22 08:09:49'], ['nama_bantuan' => 'PKH', 'sumber_dana' => 'APBN', 'kriteria' => 'Keluarga dengan komponen pendidikan/kesehatan', 'keterangan' => 'Program Keluarga Harapan', 'created_at' => '2025-08-22 08:09:49'], ['nama_bantuan' => 'BPNT', 'sumber_dana' => 'APBN', 'kriteria' => 'Keluarga penerima bantuan pangan', 'keterangan' => 'Bantuan Pangan Non Tunai', 'created_at' => '2025-08-22 08:09:49']]);
    }
}
