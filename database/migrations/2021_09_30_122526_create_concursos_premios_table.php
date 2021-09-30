<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcursosPremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos_premios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_concurso')->nullable();
            $table->unsignedBigInteger('id_premio')->nullable();
            $table->unsignedBigInteger('id_ganador')->nullable();

            $table->foreign('id_concurso')->references('id')->on('concursos')->onDelete('cascade');
            $table->foreign('id_premio')->references('id')->on('premios')->onDelete('cascade');
            $table->foreign('id_ganador')->references('doc')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concursos_premios');
    }
}
