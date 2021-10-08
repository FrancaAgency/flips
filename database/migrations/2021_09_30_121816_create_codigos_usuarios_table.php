<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_lote')->nullable();
            $table->unsignedBigInteger('usuario_doc')->nullable();
            $table->unsignedBigInteger('id_concurso')->nullable();

            $table->foreign('codigo_lote')->references('id')->on('codigos')->onDelete('cascade');
            $table->foreign('usuario_doc')->references('doc')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_concurso')->references('id')->on('concursos')->onDelete('cascade');
            
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
        Schema::dropIfExists('codigos_usuarios');
    }
}
