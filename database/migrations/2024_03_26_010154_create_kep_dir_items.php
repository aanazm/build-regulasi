<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepDirItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kep_dir_items', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_tetap');
            $table->date('masa_berlaku');
            $table->date('tgl_pengesahan');
            $table->string('file')->nullable();
            $table->foreignId('list_id')->nullable();
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('kep_dir')
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
        Schema::dropIfExists('kep_dir_items');
    }
}
