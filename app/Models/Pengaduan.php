<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama_pengadu',
        'kontak',
        'judul',
        'isi_pengaduan',
        'status',
        'tanggapan',
    ];

    // Optional: status options
    public static function statusList()
    {
        return ['Baru', 'Diproses', 'Selesai'];
    }
}
