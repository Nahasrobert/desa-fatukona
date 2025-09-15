<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkk extends Model
{
    use HasFactory;

    protected $table = 'pkk';

    protected $fillable = [
        'nama',
        'jabatan',
        'periode',
        'foto',
    ];
}
