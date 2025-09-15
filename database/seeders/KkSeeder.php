<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kk')->truncate();
        DB::table('kk')->insert([['no_kk' => '6201123456789012', 'kepala_keluarga' => 'ASMIARTI', 'alamat' => 'Jl. Mawar', 'rt' => '02', 'rw' => '01', 'desa' => 'Fatukona', 'kecamatan' => 'Takari', 'kabupaten' => 'Kupang', 'provinsi' => 'Nusa Tenggara Timur', 'kode_pos' => NULL, 'created_at' => '2025-08-22 08:09:35'], ['no_kk' => '6201123456789013', 'kepala_keluarga' => 'BUDI SANTOSO', 'alamat' => 'Jl. Melati', 'rt' => '03', 'rw' => '01', 'desa' => 'Fatukona', 'kecamatan' => 'Takari', 'kabupaten' => 'Kupang', 'provinsi' => 'Nusa Tenggara Timur', 'kode_pos' => '74112', 'created_at' => '2025-08-22 08:09:48'], ['no_kk' => '6201123456789014', 'kepala_keluarga' => 'CITRA DEWI', 'alamat' => 'Jl. Kenanga', 'rt' => '01', 'rw' => '02', 'desa' => 'Fatukona', 'kecamatan' => 'Takari', 'kabupaten' => 'Kupang', 'provinsi' => 'Nusa Tenggara Timur', 'kode_pos' => '74112', 'created_at' => '2025-08-22 08:09:48']]);
    }
}
