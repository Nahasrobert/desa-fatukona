<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratTemplateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('surat_template')->truncate();
        DB::table('surat_template')->insert([['nama_surat' => 'Surat Keterangan Domisili', 'isi_template' => 'SURAT KETERANGAN DOMISILI\n\nYang bertanda tangan di bawah ini Kepala Desa Natai Baru menerangkan bahwa:\n\nNama    : [NAMA]\nNIK     : [NIK]\nAlamat  : [ALAMAT]\n\nAdalah benar penduduk Desa Natai Baru.\n\nDemikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.\n\nNatai Baru, [TANGGAL]\nKepala Desa\n[KEPALA_DESA]', 'nomor_format' => '{NO}/DS-NB/{BULAN_ROMAWI}/{TAHUN}', 'created_at' => '2025-08-22 08:09:35'], ['nama_surat' => 'Surat Keterangan Usaha', 'isi_template' => 'SURAT KETERANGAN USAHA\n\nYang bertanda tangan di bawah ini Kepala Desa menerangkan bahwa:\nNama : [NAMA]\nNIK  : [NIK]\nAlamat : [ALAMAT]\n\nYang bersangkutan benar memiliki usaha [JENIS_USAHA] berlokasi di [ALAMAT_USAHA].\n\nDemikian untuk dipergunakan sebagaimana mestinya.\n\nNatai Baru, [TANGGAL]\nKepala Desa\n[KEPALA_DESA]', 'nomor_format' => '{NO}/SKU/DS-NB/{BULAN}/{TAHUN}', 'created_at' => '2025-08-22 08:09:49']]);
    }
}
