<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    protected $table = 'kk';
    protected $primaryKey = 'id_kk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
    ];
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'id_kk', 'id_kk');
        // Sesuaikan foreign key dan local key kalau beda
    }
}
