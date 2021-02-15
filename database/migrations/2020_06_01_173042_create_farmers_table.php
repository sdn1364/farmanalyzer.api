<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('birthday')->nullable();
            $table->string('education')->nullable();
            $table->string('gender');
            $table->string('work_experience')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('province_id');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('province_id')->references('id')->on('provinces');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
}
