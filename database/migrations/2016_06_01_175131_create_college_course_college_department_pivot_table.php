<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeCourseCollegeDepartmentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_course_department', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('college_course_id')->unsigned()->index();
            $table->foreign('college_course_id')->references('id')->on('college_courses')->onDelete('cascade');
            $table->integer('college_department_id')->unsigned()->index();
            $table->foreign('college_department_id')->references('id')->on('college_departments')->onDelete('cascade');
            $table->string('season')->nullable();
            $table->string('semester')->nullable();
            $table->string('year')->nullable();
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
        Schema::drop('college_course_college_department');
    }
}
