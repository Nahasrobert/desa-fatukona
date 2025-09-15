<?php
// app/Models/Lapak.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $table = 'lapak';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'penjual',
        'kontak',
        'foto',
    ];
}
