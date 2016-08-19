<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoExame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_exame',function(Blueprint $table){
            $table->increments('id');
            $table->timestamp('data');
            $table->integer('cargo_id')->unsigned();
            $table->integer('exame_id')->unsigned();
            $table->timestamps();

            $table->foreign('exame_id')->references('id')->on('exames');
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cargo_exame');
    }
}
