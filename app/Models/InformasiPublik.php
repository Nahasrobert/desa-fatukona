<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPublik extends Model
{
    use HasFactory;

    protected $table = 'informasi_publik';

    protected $fillable = [
        'judul',
        'kategori',
        'isi',
        'file',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Daftar kategori yang valid (sesuaikan dengan kebutuhan)
    public static function getKategoriList()
    {
        return [
            'Pengumuman',
            'Berita',
            'Laporan',
            'Agenda',
            'Lainnya',
        ];
    }
}
