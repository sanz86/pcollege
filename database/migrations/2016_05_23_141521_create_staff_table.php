<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('qualification')->nullable();
            $table->string('staff_code')->nullable();
            $table->text('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image_url')->nullable();
            $table->string('bio_url')->nullable();
            $table->string('staff_type');
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
        Schema::drop('staff');
    }
}
