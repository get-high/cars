<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body');
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->text('salon')->nullable();
            $table->integer('car_class_id');
            $table->string('kpp')->nullable();
            $table->integer('year')->nullable();
            $table->string('color')->nullable();
            $table->integer('car_body_id');
            $table->integer('car_engine_id');
            $table->boolean('is_new')->default(false);
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
        Schema::dropIfExists('cars');
    }
}
