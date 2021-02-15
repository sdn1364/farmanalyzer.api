<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herds', function (Blueprint $table) {
            $table->id();
            $table->string('herd_number');
            $table->unsignedBigInteger('farm_id');
            $table->date('start_date')->nullable();
            $table->integer('age');
            $table->integer('quantity');
            $table->double('saloon_area');
            $table->integer('capacity');
            $table->timestamps();
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herds');
    }
}
