<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dumps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("address");
            $table->float("weight");
            $table->float("level");
            $table->unsignedBigInteger('device_id');
            $table->timestamps();

            $table->foreign('device_id')
            ->references('id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dumps');
    }
}
