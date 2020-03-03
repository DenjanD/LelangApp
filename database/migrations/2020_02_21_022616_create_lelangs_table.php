<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelangs', function (Blueprint $table) {
            $table->increments('id_lelang');
            $table->integer('id_barang')->unsigned();
            $table->timestamp('tgl_lelang');
            $table->timestamp('end_lelang')->nullable();
            $table->integer('harga_akhir');
            $table->integer('id_user')->unsigned();
            $table->integer('id_petugas')->unsigned();
            $table->enum('status',['Dibuka','Ditutup']);
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barangs');
            $table->foreign('id_user')->references('id_user')->on('masyarakats');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lelangs');
    }
}
