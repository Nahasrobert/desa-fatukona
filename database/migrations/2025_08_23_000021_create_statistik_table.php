    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('statistik', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kategori', 100);
                $table->string('label', 100);
                $table->integer('jumlah')->default(0);
                $table->year('tahun');
                $table->timestamps();
                $table->unique(['kategori', 'label', 'tahun'], 'uq_stat');
                $table->index('tahun', 'idx_stat_tahun');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('statistik');
        }
    };
