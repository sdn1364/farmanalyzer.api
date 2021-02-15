<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andatas', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->unsignedBigInteger('herd_id');
            $table->integer('current_age')->nullable();
            $table->integer('loss')->nullable();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('light_off')->nullable();

            $table->float('pre_starter')->nullable();
            $table->float('pre_seed')->nullable();
            $table->float('growth_seed')->nullable();
            $table->float('after_seed_a')->nullable();
            $table->float('after_seed_b')->nullable();

            $table->string('food_additive')->nullable();
            $table->string('food_drug')->nullable();

            $table->double('weight_average')->nullable();
            $table->unsignedBigInteger('vaccine_id')->nullable();
            $table->unsignedBigInteger('vaccine_method_id')->nullable();
            $table->unsignedBigInteger('vaccine_company_id')->nullable();
            $table->timestamps();

            $table->foreign('vaccine_id')->references('id')->on('vaccines');
            $table->foreign('vaccine_method_id')->references('id')->on('vaccine_methods');
            $table->foreign('vaccine_company_id')->references('id')->on('vaccine_companies');
            $table->foreign('farm_id')->references('id')->on('farms');
            $table->foreign('herd_id')->references('id')->on('herds');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('andatas');
    }
}
