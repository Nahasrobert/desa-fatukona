<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ApbdesaSeeder::class,
            BantuanJenisSeeder::class,
            UsersSeeder::class,
            KkSeeder::class,
            PendudukSeeder::class,
            BantuanPenerimaSeeder::class,
            BantuanCairSeeder::class,
            BeritaSeeder::class,
            BpdSeeder::class,
            GaleriSeeder::class,
            InformasiPublikSeeder::class,
            InventarisSeeder::class,
            LapakSeeder::class,
            LinmasSeeder::class,
            PembangunanSeeder::class,
            PemerintahDesaSeeder::class,
            PengaduanSeeder::class,
            PkkSeeder::class,
            ProdukHukumSeeder::class,
            SotkSeeder::class,
            StatistikSeeder::class,
            SuratTemplateSeeder::class,
            SuratCounterSeeder::class,
            SuratKeluarSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
