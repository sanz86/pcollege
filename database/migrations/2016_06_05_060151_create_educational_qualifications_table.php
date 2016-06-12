<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('people_id');
            $table->string('university');
            $table->string('course');
            $table->string('subject')->nullable();
            $table->string('enrollment_year')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('division')->nullable();
            $table->integer('seq');
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
        Schema::drop('educational_qualifications');
    }
}
