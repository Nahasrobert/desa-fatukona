<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apbdesa extends Model
{
    protected $table = 'apbdesa';

    protected $fillable = [
        'tahun',
        'bidang',
        'anggaran',
        'realisasi',
    ];

    protected $casts = [
        'tahun'     => 'integer',
        'anggaran'  => 'decimal:2',
        'realisasi' => 'decimal:2',
    ];

    // Atribut bantu: persen realisasi
    public function getPersenAttribute(): float
    {
        if ((float)$this->anggaran <= 0) {
            return 0.0;
        }
        return round(((float)$this->realisasi / (float)$this->anggaran) * 100, 2);
    }
}
