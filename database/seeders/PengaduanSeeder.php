<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel dulu biar tidak duplikat data
        DB::table('pengaduan')->truncate();

        // Insert data contoh
        DB::table('pengaduan')->insert([
            [
                'nama_pengadu' => 'Rohman',
                'kontak' => '081377777777',
                'judul' => 'Lampu Jalan Mati',
                'isi_pengaduan' => 'Lampu jalan di RT 02 mati sejak 3 hari.',
                'status' => 'Diproses',
                'tanggapan' => null,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'nama_pengadu' => 'Dinda',
                'kontak' => '081366666666',
                'judul' => 'Sampah Menumpuk',
                'isi_pengaduan' => 'Sampah menumpuk di dekat sungai.',
                'status' => 'Baru',
                'tanggapan' => null,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_pengadu' => 'Andi',
                'kontak' => '081355555555',
                'judul' => 'Jalan Berlubang',
                'isi_pengaduan' => 'Jalan menuju sekolah banyak berlubang dan membahayakan pengguna motor.',
                'status' => 'Selesai',
                'tanggapan' => 'Sudah diperbaiki oleh dinas PU minggu lalu.',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}
