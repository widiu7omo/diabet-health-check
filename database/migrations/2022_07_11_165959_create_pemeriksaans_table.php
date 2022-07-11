<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pemeriksaan');
            $table->date('tgl_periksa');
            $table->longText('detail_pembahasan');
            $table->string('hasil_diagnosa');
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
        Schema::drop('pemeriksaans');
    }
}
