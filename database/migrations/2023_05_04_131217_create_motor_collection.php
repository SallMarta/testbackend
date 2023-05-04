<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateMotorCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('motor', function ($collection) {
            $collection->index('id');
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
        Schema::connection('mongodb')->drop('motor');
    }
}