    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('sotk', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama_jabatan', 100);
    $table->integer('atasan_id')->unsigned()->nullable();
    $table->integer('urutan')->default(0);
    $table->timestamps();
    $table->index('atasan_id', 'fk_sotk_atasan');
});
Schema::table('sotk', function (Blueprint $table) {
    $table->foreign('atasan_id')->references('id')->on('sotk')->onUpdate('cascade')->onDelete('set null');
});

        }

        public function down(): void {

Schema::table('sotk', function (Blueprint $table) { $table->dropForeign(['atasan_id']); });
Schema::dropIfExists('sotk');

        }
    };
