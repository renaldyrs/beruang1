<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplier', function (Blueprint $table) {
            $table->increments('id_suplier');
            $table->string('nama_suplier');
            $table->integer('id_kota')->unsigned();
            $table->integer('id_provinsi')->unsigned();
            $table->string('alamat');
            $table->timestamps();
            $table->foreign('id_kota')->references('id_kota')->on('kota')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_provinsi')->references('id_provinsi')->on('provinsi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suplier');
    }
}
