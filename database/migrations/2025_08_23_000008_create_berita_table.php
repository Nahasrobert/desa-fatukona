    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('berita', function (Blueprint $table) {
                $table->increments('id');
                $table->string('judul', 255);
                $table->mediumText('isi');
                $table->string('kategori', 100)->nullable();
                $table->string('penulis', 100)->nullable();
                $table->date('tanggal')->nullable();
                $table->string('gambar', 255)->nullable();
                $table->timestamps();
                $table->string('slug', 191)->unique();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('berita');
        }
    };
