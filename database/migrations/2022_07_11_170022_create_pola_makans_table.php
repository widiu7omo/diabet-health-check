<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolaMakansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pola_makans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->longText('dilarang');
            $table->longText('dianjurkan');
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
        Schema::drop('pola_makans');
    }
}
