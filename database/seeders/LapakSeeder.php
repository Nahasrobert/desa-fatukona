<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LapakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lapak')->truncate();
        DB::table('lapak')->insert([['nama_produk' => 'Kopi Liberika Natai', 'deskripsi' => 'Kopi lokal kemasan 200gr', 'harga' => '45000.00', 'stok' => 50, 'penjual' => 'UMKM Kopi Natai', 'kontak' => '081300000001', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama_produk' => 'Anyaman Rotan', 'deskripsi' => 'Kerajinan tangan anyaman rotan', 'harga' => '120000.00', 'stok' => 20, 'penjual' => 'Kube Rotan Jaya', 'kontak' => '081300000002', 'foto' => NULL, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
