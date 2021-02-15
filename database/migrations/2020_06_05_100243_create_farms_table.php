<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('farmer_id');
            $table->date('birthday')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->text('address')->nullable();
            $table->string('gmap')->nullable();
            $table->integer('herd')->nullable();
            $table->string('worker')->nullable();
            $table->unsignedBigInteger('expert_id');
            $table->timestamps();



            $table->foreign('farmer_id')->references('id')->on('farmers');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('expert_id')->references('id')->on('expert');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}
