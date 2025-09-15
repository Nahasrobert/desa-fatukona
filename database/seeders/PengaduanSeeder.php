<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengaduan')->truncate();
        DB::table('pengaduan')->insert([['nama_pengadu' => 'Rohman', 'kontak' => '081377777777', 'isi_pengaduan' => 'Lampu jalan di RT 02 mati sejak 3 hari.', 'status' => 'Diproses', 'tanggapan' => NULL, 'created_at' => '2025-08-22 08:09:48'], ['nama_pengadu' => 'Dinda', 'kontak' => '081366666666', 'isi_pengaduan' => 'Sampah menumpuk di dekat sungai.', 'status' => 'Baru', 'tanggapan' => NULL, 'created_at' => '2025-08-22 08:09:48']]);
    }
}
