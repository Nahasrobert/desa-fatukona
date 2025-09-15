    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('inventaris', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_barang', 255);
                $table->string('kategori', 100)->nullable();
                $table->integer('jumlah')->default(0);
                $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->default('Baik');
                $table->string('lokasi', 191);
                $table->year('tahun_pengadaan')->nullable();
                $table->string('sumber_dana', 100)->nullable();
                $table->timestamps();
                $table->index('kategori', 'idx_inv_kategori');
                $table->index('lokasi', 'idx_inv_lokasi');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('inventaris');
        }
    };
