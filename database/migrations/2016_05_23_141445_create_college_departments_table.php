<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('department_name');
            $table->string('stream')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unique(array('client_id', 'department_name'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('college_departments');
    }
}
