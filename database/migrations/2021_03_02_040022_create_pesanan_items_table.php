<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_item', function (Blueprint $table) {
            $table->increments('id_pesan_item');
            $table->integer('id_barang')->unsigned();
            $table->integer('id_pesanan')->unsigned();
            $table->integer('jumlah_barang');
            $table->integer('harga_barang');
            $table->foreign('id_barang')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_item');
    }
}
