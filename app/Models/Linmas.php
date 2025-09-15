<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linmas extends Model
{
    use HasFactory;

    protected $table = 'linmas';

    protected $fillable = [
        'nama',
        'jabatan',
        'periode',
        'foto',
        'kontak',
    ];
}
