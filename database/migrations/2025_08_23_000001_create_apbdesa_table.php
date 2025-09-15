    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('apbdesa', function (Blueprint $table) {
    $table->increments('id');
    $table->year('tahun');
    $table->string('bidang', 100);
    $table->decimal('anggaran', 15, 2)->default(0);
    $table->decimal('realisasi', 15, 2)->default(0);
    $table->timestamps();
    $table->index('tahun', 'idx_tahun');
    $table->index('bidang', 'idx_bidang');
});

        }

        public function down(): void {
            Schema::dropIfExists('apbdesa');
        }
    };
