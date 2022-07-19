<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->unsignedBigInteger('categoria_de_gastos_id')->unsigned();
            $table->foreign('categoria_de_gastos_id')->references('id')->on('categoria_gastos')->onDelete('cascade');

            $table->text('descricao_gasto');

            $table->decimal('valor_do_gasto', 10, 2);
            $table->string('data_do_gasto');
            $table->string('dia_do_gasto');
            $table->string('mes_do_gasto');
            $table->string('ano_do_gasto');
            $table->string('forma_de_pagamento');

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
        Schema::dropIfExists('gastos');
    }
};
