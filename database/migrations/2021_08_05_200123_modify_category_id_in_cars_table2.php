<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCategoryIdInCarsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('car_class_id')->nullable()->constrained();
            $table->foreignId('car_body_id')->nullable()->constrained();
            $table->foreignId('car_engine_id')->nullable()->constrained();
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
            $table->dropColumn(['car_class_id']);
            $table->dropColumn(['car_body_id']);
            $table->dropColumn(['car_engine_id']);
        });
    }
}
