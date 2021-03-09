<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id_pengiriman');
            $table->integer('id_kurir')->unsigned();
            $table->integer('id_pesanan')->unsigned();
            $table->string('nama_penerima');
            $table->string('no_hp');
            $table->string('kode_pos');
            $table->string('jenis_pengiriman');
            $table->string('bianya_pengiriman');
            $table->string('no_resi');
            $table->timestamps();
            $table->foreign('id_kurir')->references('id_kurir')->on('kurirs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onUpdate('cascade')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
