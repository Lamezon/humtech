<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVencimentoToFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faturas', function (Blueprint $table) {
            $table->string('data_emitido', 100)->default('Não-Emitido')->nullable();
            $table->string('forma_pagamento', 100)->default('')->nullable();
            $table->string('data_vencimento', 100)->default('1/1/2022')->nullable();
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
