<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembangunanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pembangunan')->truncate();
        DB::table('pembangunan')->insert([['nama_kegiatan' => 'Pengecoran Jalan RT 02', 'lokasi' => 'RT 02/RW 01', 'anggaran' => '300000000.00', 'sumber_dana' => 'Dana Desa', 'tahun' => 2025, 'progres' => 45, 'deskripsi' => 'Pengecoran sepanjang 500m', 'foto' => 'pembangunan/jalanrt02.jpg', 'created_at' => '2025-08-22 08:09:48'], ['nama_kegiatan' => 'Perbaikan Posyandu', 'lokasi' => 'Balai Desa', 'anggaran' => '80000000.00', 'sumber_dana' => 'Dana Desa', 'tahun' => 2025, 'progres' => 20, 'deskripsi' => 'Renovasi fasilitas posyandu', 'foto' => 'pembangunan/posyandu.jpg', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
