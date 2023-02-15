<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earns', function (Blueprint $table) {
            $table->id();
            $table->double('atual', 8, 2)->default('0');
            $table->double('total', 8, 2)->default('0');
            $table->boolean('status')->default(false);
            $table->tinyInteger('del')->default('0');
            $table->timestamps();
        });
        DB::table('earns')->insert(
            array(
                'total' => '0'
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
        Schema::dropIfExists('earns');
    }
}
