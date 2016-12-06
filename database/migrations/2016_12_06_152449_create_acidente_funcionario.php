<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcidenteFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acidente_funcionario',function(Blueprint $table){
            $table->increments('id');
            $table->integer('acidente_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->timestamps();

            $table->foreign('acidente_id')->references('id')->on('acidentes');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
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
        Schema::drop('acidente_funcionario');
    }
}
