<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_funcionario',function(Blueprint $table){
            $table->increments('id');
            $table->timestamp('data');
            $table->integer('cargo_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('cargo_id')->references('id')->on('cargos');
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
        Schema::drop('cargo_funcionario');
    }
}
