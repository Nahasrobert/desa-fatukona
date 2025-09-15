    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('bantuan_cair', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_penerima')->unsigned();
                $table->date('tanggal');
                $table->decimal('jumlah', 15, 2)->default(0);
                $table->text('keterangan')->nullable();
                $table->timestamps();
                $table->index('id_penerima', 'fk_cair_penerima');
                $table->index('tanggal', 'idx_cair_tanggal');
            });
            Schema::table('bantuan_cair', function (Blueprint $table) {
                $table->foreign('id_penerima')->references('id')->on('bantuan_penerima')->onUpdate('cascade')->onDelete('cascade');
            });
        }

        public function down(): void
        {

            Schema::table('bantuan_cair', function (Blueprint $table) {
                $table->dropForeign(['id_penerima']);
            });
            Schema::dropIfExists('bantuan_cair');
        }
    };
