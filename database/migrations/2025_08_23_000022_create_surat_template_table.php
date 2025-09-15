    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void
        {

            Schema::create('surat_template', function (Blueprint $table) {
                $table->increments('id_template');
                $table->string('nama_surat', 191)->unique();
                $table->mediumText('isi_template');
                $table->string('nomor_format', 255)->default('{NO}/DS-NB/{BULAN_ROMAWI}/{TAHUN}');
                $table->timestamps();
                $table->unique('nama_surat', 'uq_nama_surat');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('surat_template');
        }
    };
