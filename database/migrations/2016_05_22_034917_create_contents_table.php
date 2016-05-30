<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('url')->nullable();
            $table->string('content_type')->nullable();
            $table->string('additional_1')->nullable();
            $table->string('additional_2')->nullable();
            $table->string('additional_3')->nullable();
            $table->string('additional_4')->nullable();
            $table->string('additional_5')->nullable();
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
        Schema::drop('contents');
    }
}
