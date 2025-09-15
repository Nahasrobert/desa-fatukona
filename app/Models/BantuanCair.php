<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BantuanCair extends Model
{
    protected $table = 'bantuan_cair';
    protected $fillable = [
        'id_penerima',
        'tanggal',
        'jumlah',
        'keterangan'
    ];



    public function bantuanPenerima()
    {
        return $this->belongsTo(BantuanPenerima::class, 'id_bantuan_penerima');
    }
    public function penerima()
    {
        return $this->belongsTo(BantuanPenerima::class, 'id_penerima');
    }
}
