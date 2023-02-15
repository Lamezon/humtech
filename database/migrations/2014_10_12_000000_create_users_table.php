<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->integer('level')->default(0);
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
        DB::table('users')->insert(
            array(
                'id' => 0,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'level' => '0',
                'password' => Hash::make('123456'),
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
        Schema::dropIfExists('users');
    }
}
