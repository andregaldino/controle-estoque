<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLembrete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembretes',function(Blueprint $table){
            $table->increments('id');
            $table->integer('min');
            $table->integer('produto_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lembretes');
    }
}
