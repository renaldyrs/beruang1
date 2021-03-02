<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->integer('id_suplier')->unsigned();
            $table->string('nama');
            $table->string('harga');
            $table->string('file');
            $table->integer('stock');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('category')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_suplier')->references('id_suplier')->on('suplier')->onUpdate('cascade')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
