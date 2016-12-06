<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcidentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('acidentes',function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao');
            $table->string('procedimento');
            $table->boolean('culpado_inicial');
            $table->integer('culpado_final');
            $table->integer('tipo_acidente_id')->unsigned();
            $table->foreign('tipo_acidente_id')->references('id')->on('tipo_acidentes');
            $table->timestamps();
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
        Schema::drop('acidentes');
    }
}
