<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kk', function (Blueprint $table) {
            $table->increments('id_kk');
            $table->string('no_kk', 20);
            $table->string('kepala_keluarga', 100);
            $table->text('alamat');
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('desa', 100)->default('Fatukona');
            $table->string('kecamatan', 100)->default('Takari');
            $table->string('kabupaten', 100)->default('Kupang');
            $table->string('provinsi', 100)->default('Nusa Tenggara Timur');
            $table->string('kode_pos', 10)->nullable();
            $table->timestamps();

            $table->unique('no_kk');
            // JANGAN buat index komposit di sini (yang full-length) karena akan 1071
            $table->index(['rt', 'rw'], 'idx_rt_rw');
        });

        // Buat index komposit pakai PREFIX agar byte count < 1000 (aman di MySQL lama)
        if (DB::getDriverName() === 'mysql') {
            DB::statement('CREATE INDEX idx_wilayah ON kk (desa(50), kecamatan(50), kabupaten(50), provinsi(50))');
        }
    }

    public function down(): void
    {
        // Hapus index komposit prefix (kalau ada)
        if (Schema::hasTable('kk')) {
            try {
                Schema::table('kk', function (Blueprint $table) {
                    $table->dropIndex('idx_wilayah');
                    $table->dropIndex('idx_rt_rw');
                    $table->dropUnique(['no_kk']);
                });
            } catch (\Throwable $e) {
                // abaikan jika index sudah tidak ada
            }
        }

        Schema::dropIfExists('kk');
    }
};
