<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolaObatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pola_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('obat');
            $table->integer('jumlah');
            $table->string('anjuran');
            $table->unsignedBigInteger('jadwal_id')->nullable();
            $table->unsignedBigInteger('pemeriksaan_id')->nullable();
            $table->foreign('jadwal_id')->references('id')->on('jadwal_checkups')->onDelete('cascade');
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaans')->onDelete('cascade');
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
        Schema::drop('pola_obats');
    }
}
