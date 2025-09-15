<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanPenerima extends Model
{
    use HasFactory;

    protected $table = 'bantuan_penerima';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_jenis',
        'id_penduduk',
        'periode',
        'status',
        'jumlah',
        'keterangan'
    ];




    public function pencairan()
    {
        return $this->hasOne(BantuanCair::class, 'id_penerima');
    }


    public function bantuan()
    {
        return $this->belongsTo(\App\Models\BantuanJenis::class, 'bantuan_id', 'id');
    }
    public function cair()
    {
        return $this->hasMany(BantuanCair::class, 'id_penerima');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id_penduduk');
    }
    public function jenis()
    {
        return $this->belongsTo(BantuanJenis::class, 'id_jenis');
    }
}
