<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCategoryIdInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained();
            $table->dropColumn('car_class_id');
            $table->dropColumn('car_body_id');
            $table->dropColumn('car_engine_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['category_id']);
            $table->integer('car_class_id');
            $table->integer('car_body_id');
            $table->integer('car_engine_id');
        });
    }
}
