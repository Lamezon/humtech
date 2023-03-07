<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('cpf', 255)->nullable()->default('0');
            $table->string('phone', 255)->nullable()->default('0');
            $table->string('address', 255)->nullable()->default('');
            $table->integer('times')->default(0);
            $table->double('total', 8, 2)->default(0);
            $table->tinyInteger('del')->default('0');
            $table->timestamps();
        });

        DB::table('clients')->insert(
            array(
                'id' => 0,
                'name' => 'Cliente Padrão',
                'cpf' => '0',
                'phone' => '0',
                'address' => '',
                'times' => 0,
                'total' => 0,
                'del' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
