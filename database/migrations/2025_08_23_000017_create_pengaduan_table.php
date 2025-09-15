    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('pengaduan', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama_pengadu', 100)->nullable();
    $table->string('kontak', 50)->nullable();
    $table->text('isi_pengaduan');
    $table->enum('status', ['Baru','Diproses','Selesai'])->default('Baru');
    $table->text('tanggapan')->nullable();
    $table->timestamps();
    $table->index('status', 'idx_pengaduan_status');
});

        }

        public function down(): void {
            Schema::dropIfExists('pengaduan');
        }
    };
