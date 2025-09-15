    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('penduduk', function (Blueprint $table) {
    $table->increments('id_penduduk');
    $table->integer('id_kk')->unsigned()->nullable();
    $table->string('nik', 20);
    $table->string('nama', 100);
    $table->string('tempat_lahir', 100)->nullable();
    $table->date('tanggal_lahir')->nullable();
    $table->enum('jenis_kelamin', ['L','P'])->nullable();
    $table->string('agama', 50)->nullable();
    $table->string('pendidikan', 100)->nullable();
    $table->string('pekerjaan', 100)->nullable();
    $table->enum('status_kawin', ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'])->nullable();
    $table->string('hubungan_keluarga', 50)->nullable();
    $table->string('kewarganegaraan', 50)->default('Indonesia');
    $table->text('alamat')->nullable();
    $table->enum('disabilitas', ['Ya','Tidak'])->default('Tidak');
    $table->enum('vaksinasi', ['Belum','Dosis 1','Dosis 2','Booster'])->default('Belum');
    $table->string('no_hp', 30)->nullable();
    $table->string('email', 120)->nullable();
    $table->timestamps();
    $table->unique('nik');
    $table->index('id_kk', 'fk_penduduk_kk');
    $table->index('nama', 'idx_nama');
    $table->index(['kewarganegaraan','jenis_kelamin'], 'idx_wilayah2');
});
Schema::table('penduduk', function (Blueprint $table) {
    $table->foreign('id_kk')->references('id_kk')->on('kk')->onUpdate('cascade')->onDelete('set null');
});

        }

        public function down(): void {

Schema::table('penduduk', function (Blueprint $table) { $table->dropForeign(['id_kk']); });
Schema::dropIfExists('penduduk');

        }
    };
