<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiPengirimanSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pengiriman_surat', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_pengiriman')->unsigned();
            $table->integer('id_surat')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_pengiriman')->references('id')->on('pengiriman')->onDelete('cascade');
            $table->foreign('id_surat')->references('id')->on('surat')->onDelete('cascade');                     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
