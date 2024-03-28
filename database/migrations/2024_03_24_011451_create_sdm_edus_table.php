<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdmEdusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdm_edus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sdm_id')->nullable();
            $table->foreignId('edu_id')->nullable();
            $table->string('name');
            //$table->foreignId('level_id');
            
            $table->timestamps();

            $table->foreign('sdm_id')->references('id')->on('k_sdm')->onDelete('set null');
            $table->foreign('edu_id')->references('id')->on('expert_education')->onDelete('set null');
            //$table->foreign('level_id')->references('id')->on('expert_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sdm_edus');
    }
}
