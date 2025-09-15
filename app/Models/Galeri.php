<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $casts = [
        'tanggal' => 'date',
    ];
    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'kategori',
        'tanggal',
    ];
}
