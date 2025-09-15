    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('surat_keluar', function (Blueprint $table) {
                $table->increments('id_surat');
                $table->unsignedInteger('id_template');
                $table->unsignedInteger('id_penduduk');
                $table->longText('data_json')->nullable();
                $table->string('nomor_surat', 191);
                $table->unsignedBigInteger('created_by')->nullable(); // ✅ Perbaikan di sini
                $table->timestamps();

                $table->index('nomor_surat', 'idx_surat_nomor');
                $table->index('id_template', 'idx_surat_template');
                $table->index('id_penduduk', 'idx_surat_penduduk');
            });

            Schema::table('surat_keluar', function (Blueprint $table) {
                $table->foreign('id_template')
                    ->references('id_template')
                    ->on('surat_template')
                    ->onUpdate('cascade');

                $table->foreign('id_penduduk')
                    ->references('id_penduduk')
                    ->on('penduduk')
                    ->onUpdate('cascade');

                $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            });
        }

        public function down(): void
        {
            Schema::table('surat_keluar', function (Blueprint $table) {
                $table->dropForeign(['id_template']);
                $table->dropForeign(['id_penduduk']);
                $table->dropForeign(['created_by']);
            });

            Schema::dropIfExists('surat_keluar');
        }
    };
