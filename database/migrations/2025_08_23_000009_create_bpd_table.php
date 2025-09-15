    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\DB;

    return new class extends Migration {
        public function up(): void {

Schema::create('bpd', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama', 100);
    $table->string('jabatan', 100);
    $table->string('periode', 50)->nullable();
    $table->string('foto', 255)->nullable();
    $table->timestamps();
});

        }

        public function down(): void {
            Schema::dropIfExists('bpd');
        }
    };
