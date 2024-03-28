<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_list', function (Blueprint $table) {
            $table->id();
            $table->string('kd');
            $table->string('name');
            $table->bigInteger('menu_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('reg_menu')
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
        Schema::dropIfExists('reg_list');
    }
}
