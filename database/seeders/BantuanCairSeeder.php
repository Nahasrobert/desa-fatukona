<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BantuanCairSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bantuan_cair')->truncate();
        DB::table('bantuan_cair')->insert([['id_penerima' => 1, 'tanggal' => '2025-07-25', 'jumlah' => '300000.00', 'keterangan' => 'Pencairan tunai di kantor desa', 'created_at' => '2025-08-22 08:09:49'], ['id_penerima' => 4, 'tanggal' => '2025-07-25', 'jumlah' => '200000.00', 'keterangan' => 'Pencairan tunai di kantor desa', 'created_at' => '2025-08-22 08:09:49']]);
    }
}
