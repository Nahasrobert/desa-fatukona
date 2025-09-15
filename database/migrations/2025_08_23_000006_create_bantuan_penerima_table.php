    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('bantuan_penerima', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('id_jenis')->unsigned();
    $table->integer('id_penduduk')->unsigned();
    $table->string('periode', 20);
    $table->enum('status', ['Diajukan','Disetujui','Dicairkan'])->default('Diajukan');
    $table->decimal('jumlah', 15, 2)->default(0);
    $table->text('keterangan')->nullable();
    $table->timestamps();
    $table->unique(['id_jenis','id_penduduk','periode'], 'uq_bp_unique');
    $table->index('id_penduduk', 'fk_bp_penduduk');
    $table->index('status', 'idx_bp_status');
});
Schema::table('bantuan_penerima', function (Blueprint $table) {
    $table->foreign('id_jenis')->references('id')->on('bantuan_jenis')->onUpdate('cascade');
    $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk')->onUpdate('cascade')->onDelete('cascade');
});

        }

        public function down(): void {

Schema::table('bantuan_penerima', function (Blueprint $table) {
    $table->dropForeign(['id_jenis']);
    $table->dropForeign(['id_penduduk']);
});
Schema::dropIfExists('bantuan_penerima');

        }
    };
