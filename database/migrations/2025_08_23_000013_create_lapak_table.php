    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('lapak', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_produk', 191);
                $table->text('deskripsi')->nullable();
                $table->decimal('harga', 15, 2)->default(0);
                $table->integer('stok')->default(0);
                $table->string('penjual', 100)->nullable();
                $table->string('kontak', 50)->nullable();
                $table->string('foto', 255)->nullable();
                $table->timestamps();
                $table->index('nama_produk', 'idx_produk');
                $table->index('penjual', 'idx_penjual');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('lapak');
        }
    };
