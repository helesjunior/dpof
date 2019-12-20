<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('regiao_id');
            $table->bigInteger('regiao_jf_id');
            $table->string('nome');
            $table->string('uf');
            $table->timestamps();

            $table->foreign('regiao_id')->references('id')->on('regioes')->onDelete('cascade');
            $table->foreign('regiao_jf_id')->references('id')->on('regioes_jf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
