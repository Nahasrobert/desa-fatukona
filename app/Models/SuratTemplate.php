<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratTemplate extends Model
{
    protected $table = 'surat_template';
    protected $primaryKey = 'id_template';
    public $incrementing = true;

    protected $fillable = [
        'nama_surat',
        'isi_template',
        'nomor_format',
    ];
}
