<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanKendaraansTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::connection('mongodb')->create('penjualan_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_penjualan');
            $table->unsignedBigInteger('id_kendaraan');
            $table->string('jenis_kendaraan');
            $table->integer('harga_jual');
            $table->float('harga_total');
            $table->integer('jumlah_terjual');
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
        Schema::connection('mongodb')->dropIfExists('penjualan_kendaraans');
    }
}
