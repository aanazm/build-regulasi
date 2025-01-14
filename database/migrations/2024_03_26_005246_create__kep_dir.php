<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepDir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kep_dir', function (Blueprint $table) {
            $table->id();
            $table->string('numb');
            $table->string('name');
            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('unit')
                ->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_kep_dir');
    }
}
