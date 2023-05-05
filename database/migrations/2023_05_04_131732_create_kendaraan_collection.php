<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreateKendaraanCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('kendaraan', function ($collection) {
            $collection->timestamps();
            $collection->id();
            $collection->string('nama');
            $collection->integer('tahun');
            $collection->string('warna');
            $collection->integer('harga');
            $collection->integer('stok');
            $collection->integer('terjual')->default(0);
            $collection->string('jenis_kendaraan');
            $collection->string('jeniskendaraan_type')->nullable();
            $collection->string('jeniskendaraan_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->drop('kendaraan');
    }
}
