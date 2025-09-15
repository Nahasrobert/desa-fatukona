<?php
// database/seeders/SettingSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $defaultSettings = [
            'nama_desa' => 'Sistem Informasi Desa Fatukona',
            'alamat_desa' => 'Jl. Andi Makkasau No.12, Bone Bone, Luwu Utara',
            'visi' => 'Menjadi desa maju, mandiri, dan sejahtera',
            'misi' => 'Meningkatkan pelayanan, memajukan ekonomi desa',
            'sambutan_kepala' => '<p>Assalamu’alaikum warga Desa Sukaraya...</p>',
            'sejarah' => 'Desa Sukaraya berdiri sejak tahun 1950...',
            'struktur_organisasi' => null,
            'logo' => 'logo.png', // tambahkan ini, contoh nama file logo
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
