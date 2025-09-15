<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
    protected $table = 'pembangunan';

    protected $fillable = [
        'nama_kegiatan',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'tahun',
        'progres',
        'deskripsi',
        'foto',
    ];
}
