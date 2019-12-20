<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orgao_id');
            $table->bigInteger('estado_id');
            $table->bigInteger('municipio_id');
            $table->integer('codigo')->unique();
            $table->string('sigla')->unique();
            $table->string('descricao');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('situacao')->default(1);
            $table->timestamps();

            $table->foreign('orgao_id')->references('id')->on('orgaos')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
