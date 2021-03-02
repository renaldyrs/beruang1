<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
            $table->integer('id_barang')->unsigned();
            $table->integer('id_kota')->unsigned();
            $table->integer('id_provinsi')->unsigned();
            $table->integer('id_pelanggan')->unsigned();
            $table->date('tanggal_pesanan');
            $table->string('status');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('id_barang')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_kota')->references('id_kota')->on('kota')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
