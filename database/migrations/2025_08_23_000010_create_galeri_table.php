    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('galeri', function (Blueprint $table) {
    $table->increments('id');
    $table->string('judul', 255);
    $table->text('deskripsi')->nullable();
    $table->string('file', 255);
    $table->enum('kategori', ['Foto','Video'])->default('Foto');
    $table->date('tanggal')->nullable();
    $table->timestamps();
    $table->index('tanggal', 'idx_galeri_tanggal');
    $table->index('kategori', 'idx_galeri_kategori');
});

        }

        public function down(): void {
            Schema::dropIfExists('galeri');
        }
    };
