<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHukum extends Model
{
    use HasFactory;

    protected $table = 'produk_hukum';
    protected $casts = [
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'jenis',
        'nomor',
        'judul',
        'tanggal',
        'file',
        'ringkasan',
    ];
}
