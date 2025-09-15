    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('informasi_publik', function (Blueprint $table) {
    $table->increments('id');
    $table->string('judul', 255);
    $table->string('kategori', 100)->nullable();
    $table->mediumText('isi')->nullable();
    $table->string('file', 255)->nullable();
    $table->date('tanggal')->nullable();
    $table->timestamps();
    $table->index('kategori', 'idx_kategori');
    $table->index('tanggal', 'idx_ip_tanggal');
});

        }

        public function down(): void {
            Schema::dropIfExists('informasi_publik');
        }
    };
