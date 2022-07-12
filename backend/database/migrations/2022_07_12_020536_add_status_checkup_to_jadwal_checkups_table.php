<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusCheckupToJadwalCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_checkups', function (Blueprint $table) {
            $table->enum('status', ['dijadwalkan', 'selesai', 'terlewat'])->default('dijadwalkan');
            $table->longText('catatan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_checkups', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
