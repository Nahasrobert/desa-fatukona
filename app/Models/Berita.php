<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'kategori',
        'penulis',
        'tanggal',
        'gambar',
        'slug',
    ];

    /**
     * Generate slug unik berdasarkan judul
     */
    public static function generateUniqueSlug($judul)
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $counter = 1;

        // Cek apakah slug sudah digunakan
        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Set slug secara otomatis saat model disimpan pertama kali
     */
    protected static function booted()
    {
        static::creating(function ($berita) {
            // Hanya generate slug jika belum ada
            if (empty($berita->slug)) {
                $berita->slug = self::generateUniqueSlug($berita->judul);
            }
        });

        static::updating(function ($berita) {
            // Regenerate slug hanya jika judul berubah
            if ($berita->isDirty('judul')) {
                $berita->slug = self::generateUniqueSlug($berita->judul);
            }
        });
    }
}
