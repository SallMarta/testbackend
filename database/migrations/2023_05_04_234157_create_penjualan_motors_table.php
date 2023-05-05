<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('penjualan_motors', function ($collection) {
            $collection->id();
            $collection->dateTime('tanggal_penjualan');
            $collection->unsignedBigInteger('id_kendaraan');
            $collection->string('jenis_kendaraan');
            $collection->integer('harga_jual');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->drop('penjualan_motors');
    }
}
