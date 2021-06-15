<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetaNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_nota', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('nota_id');
            $table->foreign('nota_id')->references('id')->on('notas');

            $table->unsignedBigInteger('etiqueta_id');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiqueta_nota');
    }
}
