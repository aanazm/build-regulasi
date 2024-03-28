<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_doc', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_tetap');
            $table->date('masa_berlaku');
            $table->date('tgl_pengesahan');
            $table->string('file_doc')->nullable();
            $table->foreignId('list_id')->nullable();
            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('list_id')->references('id')->on('reg_list')
                ->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('item_doc');
    }
}
