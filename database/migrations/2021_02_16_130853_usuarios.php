<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //criar na tabela
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->id();
            $table->string('usuario', 50);
            $table->string('senha', 200);
            //last_login datetime - para ver o ultimo dia que ele entrou, e pode começar  com null
            $table->dateTime('last_login')->nullable();
            $table->tinyInteger('active')->default(1); // 1 ativo ou 0  nao ativo
            $table->timestamps(); //vai criar o create e o uptade
            $table->softDeletes(); //vai criar o delete
        });
    }

    //voltar a tras/ deletar a tabela
    public function down()
    {
        Schema::drop('usuarios');
    }
}
