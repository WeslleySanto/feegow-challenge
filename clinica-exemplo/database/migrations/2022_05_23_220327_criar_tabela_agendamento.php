<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAgendamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('specialty_id');
            $table->integer('source_id');
            $table->integer('professional_id');
            $table->string('name');
            $table->string('cpf');
            $table->date('birthdate');
            $table->dateTime('date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agendamentos');
    }
}
