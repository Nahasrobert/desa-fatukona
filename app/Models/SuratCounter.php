<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratCounter extends Model
{
    protected $table = 'surat_counter';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_template',
        'tahun',
        'bulan',
        'last_no'
    ];

    public function template()
    {
        return $this->belongsTo(SuratTemplate::class, 'id_template', 'id_template');
    }
    public function getNextNomorSurat(): string
    {
        $tahun = now()->year;
        $bulan = now()->month;

        $counter = SuratCounter::firstOrCreate(
            ['id_template' => $this->id_template, 'tahun' => $tahun, 'bulan' => $bulan],
            ['last_no' => 0]
        );

        $counter->increment('last_no');

        $nomor = $this->nomor_format;
        $nomor = str_replace('{NO}', str_pad($counter->last_no, 3, '0', STR_PAD_LEFT), $nomor);
        $nomor = str_replace('{BULAN}', $bulan, $nomor);
        $nomor = str_replace('{BULAN_ROMAWI}', $this->toRoman($bulan), $nomor);
        $nomor = str_replace('{TAHUN}', $tahun, $nomor);

        return $nomor;
    }

    private function toRoman($month)
    {
        $romawi = [1 => 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $romawi[$month] ?? '';
    }
}
