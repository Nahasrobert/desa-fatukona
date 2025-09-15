    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('produk_hukum', function (Blueprint $table) {
    $table->increments('id');
    $table->string('jenis', 100);
    $table->string('nomor', 100)->nullable();
    $table->string('judul', 255);
    $table->date('tanggal')->nullable();
    $table->string('file', 255)->nullable();
    $table->text('ringkasan')->nullable();
    $table->timestamps();
    $table->index('jenis', 'idx_jenis');
    $table->index('tanggal', 'idx_tanggal');
});

        }

        public function down(): void {
            Schema::dropIfExists('produk_hukum');
        }
    };
