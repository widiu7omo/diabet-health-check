<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalDoktersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_dokters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->foreign('dokter_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('jadwal_dokters');
    }
}
