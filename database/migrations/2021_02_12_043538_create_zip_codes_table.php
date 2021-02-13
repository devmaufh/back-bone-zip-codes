<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id('key');
            $table->integer('zip_code')->unique();
            $table->string('locality');
            $table->integer('municipality');
            $table->integer('federal_entity');
            $table->foreign('federal_entity')->references('key')->on('federal_entities');
            $table->foreign('municipality')->references('key')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
