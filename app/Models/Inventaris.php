<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'jumlah',
        'kondisi',
        'lokasi',
        'tahun_pengadaan',
        'sumber_dana'
    ];

    public static function kondisiList()
    {
        return ['Baik', 'Rusak Ringan', 'Rusak Berat'];
    }

    public static function kategoriList()
    {
        // Contoh kategori yang sering dipakai di website desa, bisa disesuaikan
        return [
            'Peralatan Kantor',
            'Elektronik',
            'Kendaraan',
            'Furniture',
            'Bangunan',
            'Lainnya',
        ];
    }
}
