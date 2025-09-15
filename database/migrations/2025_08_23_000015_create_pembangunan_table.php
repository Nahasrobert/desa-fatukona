    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('pembangunan', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama_kegiatan', 255);
    $table->string('lokasi', 255)->nullable();
    $table->decimal('anggaran', 15, 2)->default(0);
    $table->string('sumber_dana', 100)->nullable();
    $table->year('tahun')->nullable();
    $table->integer('progres')->default(0);
    $table->text('deskripsi')->nullable();
    $table->string('foto', 255)->nullable();
    $table->timestamps();
    $table->index('tahun', 'idx_pembangunan_tahun');
    $table->index('progres', 'idx_pembangunan_progress');
});

        }

        public function down(): void {
            Schema::dropIfExists('pembangunan');
        }
    };
