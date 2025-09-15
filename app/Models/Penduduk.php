<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KK;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'id_penduduk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pendidikan',
        'pekerjaan',
        'status_kawin',
        'hubungan_keluarga',
        'kewarganegaraan',
        'alamat',
        'disabilitas',
        'vaksinasi',
        'no_hp',
        'email',
    ];


    public function kk()
    {
        return $this->belongsTo(KK::class, 'id_kk', 'id_kk');
    }
}
