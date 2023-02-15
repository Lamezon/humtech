<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->integer('id_cliente');
            $table->integer('status');
            $table->string('valor', 255);
            $table->string('email',255);
            $table->text('observacao')->nullable();
            $table->tinyInteger('del')->default('0');
            $table->string('data_emissao', 20);
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('faturas');
    }
}

