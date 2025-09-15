    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('surat_counter', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('id_template')->unsigned();
    $table->integer('tahun');
    $table->integer('bulan');
    $table->integer('last_no')->default(0);
    $table->unique(['id_template','tahun','bulan'], 'uq_counter');
    $table->foreign('id_template')->references('id_template')->on('surat_template')->onUpdate('cascade')->onDelete('cascade');
});

        }

        public function down(): void {
            Schema::dropIfExists('surat_counter');
        }
    };
