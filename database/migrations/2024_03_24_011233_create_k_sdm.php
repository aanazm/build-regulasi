<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKSdm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_sdm', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('bpjsk')->nullable();
            $table->string('palace')->nullable();
            $table->datetime('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('address')->nullable();
            $table->string('kepegawaian')->nullable();
            $table->datetime('join')->nullable();
            
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
        Schema::dropIfExists('k_sdm');
    }
}
