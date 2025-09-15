<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukHukumSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk_hukum')->truncate();
        DB::table('produk_hukum')->insert([['jenis' => 'Perdes', 'nomor' => '01/2025', 'judul' => 'Peraturan Desa tentang Rencana Kerja Pemerintah Desa 2025', 'tanggal' => '2025-06-15', 'file' => NULL, 'ringkasan' => 'Menetapkan RKP Desa 2025.', 'created_at' => '2025-08-22 08:09:48'], ['jenis' => 'SK', 'nomor' => '02/2025', 'judul' => 'SK Tim Pelaksana Kegiatan', 'tanggal' => '2025-07-01', 'file' => NULL, 'ringkasan' => 'Pembentukan TPK untuk kegiatan pembangunan.', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
