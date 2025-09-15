<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratKeluarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('surat_keluar')->truncate();
        DB::table('surat_keluar')->insert([['id_template' => 1, 'id_penduduk' => 1, 'data_json' => '{"NAMA": "Andi Saputra", "NIK": "6201123456780001", "ALAMAT": "Jl. Mawar RT 02 RW 01", "TANGGAL": "21 Agustus 2025", "KEPALA_DESA": "ASMIARTI"}', 'nomor_surat' => '001/DS-NB/VIII/2025', 'created_by' => 1, 'created_at' => '2025-08-22 08:09:49'], ['id_template' => 1, 'id_penduduk' => 4, 'data_json' => '{"NAMA": "Budi Santoso", "NIK": "6201123456781001", "ALAMAT": "Jl. Melati RT 03 RW 01", "TANGGAL": "21 Agustus 2025", "KEPALA_DESA": "ASMIARTI"}', 'nomor_surat' => '002/DS-NB/VIII/2025', 'created_by' => 1, 'created_at' => '2025-08-22 08:09:49'], ['id_template' => 2, 'id_penduduk' => 2, 'data_json' => '{"NAMA": "ASMIARTI", "NIK": "6201123456780002", "ALAMAT": "Jl. Mawar RT 02 RW 01", "JENIS_USAHA": "Warung Sembako", "ALAMAT_USAHA": "Jl. Mawar RT 02 RW 01", "TANGGAL": "21 Agustus 2025", "KEPALA_DESA": "ASMIARTI"}', 'nomor_surat' => '001/SKU/DS-NB/08/2025', 'created_by' => 1, 'created_at' => '2025-08-22 08:09:49']]);
    }
}
