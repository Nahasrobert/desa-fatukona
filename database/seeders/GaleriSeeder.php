<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri')->truncate();
        DB::table('galeri')->insert([['judul' => 'Kegiatan Gotong Royong', 'deskripsi' => 'Dokumentasi kegiatan bersih desa', 'file' => 'galeri/gotongroyong1.jpg', 'kategori' => 'Foto', 'tanggal' => '2025-08-01', 'created_at' => '2025-08-22 08:09:48'], ['judul' => 'Pembangunan Jalan Desa', 'deskripsi' => 'Progres pengecoran jalan lingkungan', 'file' => 'galeri/jalan1.jpg', 'kategori' => 'Foto', 'tanggal' => '2025-08-05', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
