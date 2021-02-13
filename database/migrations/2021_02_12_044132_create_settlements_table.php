<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id('key');
            $table->string('name');
            $table->string('zone_type');
            $table->integer('settlement_type');
            $table->integer('zip_code');
            $table->foreign('settlement_type')->references('key')->on('settlement_types');
            $table->foreign('zip_code')->references('key')->on('zip_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
}
