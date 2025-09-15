<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiPublikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('informasi_publik')->truncate();
        DB::table('informasi_publik')->insert([['judul' => 'Laporan Realisasi APBDes Semester I 2025', 'kategori' => 'Keuangan', 'isi' => 'Realisasi anggaran semester I 2025 ...', 'file' => NULL, 'tanggal' => '2025-07-15', 'created_at' => '2025-08-22 08:09:48'], ['judul' => 'Daftar Penerima BLT-DD Triwulan II 2025', 'kategori' => 'Bantuan', 'isi' => 'Berikut daftar penerima BLT-DD ...', 'file' => NULL, 'tanggal' => '2025-07-20', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
