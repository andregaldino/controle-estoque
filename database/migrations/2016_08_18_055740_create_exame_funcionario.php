<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExameFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exame_funcionario',function(Blueprint $table){
            $table->increments('id');
            $table->timestamp('data');
            $table->integer('funcionario_id')->unsigned();
            $table->integer('exame_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('exame_id')->references('id')->on('exames');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exame_funcionario');
    }
}
