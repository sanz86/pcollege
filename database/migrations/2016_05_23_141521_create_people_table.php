<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name');
            $table->string('people_id');
            $table->text('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image_url')->nullable();
            $table->string('bio_url')->nullable();
            $table->timestamps();
            $table->unique(array('client_id', 'people_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
    }
}
