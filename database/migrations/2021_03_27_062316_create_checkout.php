<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('checkout', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->string('nama');
            $table->string('harga');
            $table->string('file');
            $table->integer('stock');
            $table->string('keterangan');
            $table->string('catatan');
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('category')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_barang')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('restrict');
        
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
        Schema::dropIfExists('checkout');
    }
}
