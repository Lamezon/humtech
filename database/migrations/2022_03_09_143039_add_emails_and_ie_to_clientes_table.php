<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailsAndIeToClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('inscricao', 100)->default('Sem Inscrição')->nullable();
            $table->string('telefone2', 255)->default('')->nullable();
            $table->string('email_secundario', 255)->default('')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            Schema::dropIfExists('faturas');
        });
    }
}
