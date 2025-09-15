    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('bantuan_jenis', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama_bantuan', 100);
    $table->string('sumber_dana', 100)->nullable();
    $table->text('kriteria')->nullable();
    $table->text('keterangan')->nullable();
    $table->timestamps();
    $table->unique('nama_bantuan', 'uq_bantuan_jenis');
});

        }

        public function down(): void {
            Schema::dropIfExists('bantuan_jenis');
        }
    };
