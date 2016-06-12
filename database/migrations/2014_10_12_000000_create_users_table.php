<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['client_id', 'username']);
            $table->unique(['client_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
