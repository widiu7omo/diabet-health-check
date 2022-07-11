<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalCheckupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_checkups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('checkup');
            $table->dateTime('tgl_checkup');
            $table->text('lokasi');
            $table->longText('catatan');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->foreign('dokter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jadwal_checkups');
    }
}
