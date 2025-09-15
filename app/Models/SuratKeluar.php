<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    // Nama primary key jika bukan 'id'
    protected $primaryKey = 'id_surat';
    protected $table = 'surat_keluar';

    // Jika primary key bukan auto-increment atau bukan int, sesuaikan:
    // public $incrementing = true;
    // protected $keyType = 'int';

    // Kolom yang bisa diisi mass assignment
    protected $fillable = [
        'id_template',
        'id_penduduk',
        'data_json',
        'nomor_surat',
        'created_by',
        'is_read', // tambahan untuk notif sudah dibaca
    ];

    // Jika kolom timestamps menggunakan created_at dan updated_at (default)
    public $timestamps = true;

    /**
     * Relasi ke Template Surat
     */
    public function template()
    {
        return $this->belongsTo(SuratTemplate::class, 'id_template', 'id_template');
    }

    /**
     * Relasi ke Penduduk
     */
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id_penduduk');
    }

    /**
     * Relasi ke User pembuat surat
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Helper untuk decode data_json menjadi array
     */
    public function getDataJsonAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Helper untuk encode data_json saat set
     */
    public function setDataJsonAttribute($value)
    {
        $this->attributes['data_json'] = json_encode($value);
    }
}
