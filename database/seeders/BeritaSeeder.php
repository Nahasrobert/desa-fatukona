<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('berita')->truncate();
        DB::table('berita')->insert([['judul' => 'Gotong Royong Bersih Desa', 'isi' => 'Warga Natai Baru melaksanakan kegiatan gotong royong membersihkan lingkungan...', 'kategori' => 'Kegiatan', 'penulis' => 'Operator Desa', 'tanggal' => '2025-08-01', 'gambar' => NULL, 'slug' => 'gotong-royong-bersih-desa', 'created_at' => '2025-08-22 08:09:48'], ['judul' => 'Posyandu Balita Bulan Agustus', 'isi' => 'Kegiatan posyandu rutin untuk balita diadakan di Balai Desa...', 'kategori' => 'Kesehatan', 'penulis' => 'Operator Desa', 'tanggal' => '2025-08-10', 'gambar' => NULL, 'slug' => 'posyandu-balita-agustus', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
