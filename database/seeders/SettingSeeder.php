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
            'nama_desa' => 'Desa Fatukona',
            'alamat_desa' => 'Kec. Takari Kab. Kupang',
            'visi' => 'Menjadi desa maju, mandiri, dan sejahtera',
            'misi' => 'Meningkatkan pelayanan, memajukan ekonomi desa',
            'sambutan_kepala' => '<p>Assalamu’alaikum warga Desa Fatukona...</p>',
            'sejarah' => 'Desa Fatukona berdiri sejak tahun 1950...',
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
