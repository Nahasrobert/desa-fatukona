<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('inventaris')->truncate();
        DB::table('inventaris')->insert([['nama_barang' => 'Mobil Dinas', 'kategori' => 'Kendaraan', 'jumlah' => 1, 'kondisi' => 'Baik', 'lokasi' => 'Kantor Desa', 'tahun_pengadaan' => 2023, 'sumber_dana' => 'APBDes', 'created_at' => '2025-08-22 08:09:49'], ['nama_barang' => 'Laptop Admin', 'kategori' => 'Elektronik', 'jumlah' => 3, 'kondisi' => 'Baik', 'lokasi' => 'Kantor Desa', 'tahun_pengadaan' => 2024, 'sumber_dana' => 'APBDes', 'created_at' => '2025-08-22 08:09:49']]);
    }
}
