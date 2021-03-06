<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name');
            $table->string('student_id');
            $table->text('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image_url')->nullable();
            $table->string('bio_url')->nullable();
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
        Schema::drop('students');
    }
}
