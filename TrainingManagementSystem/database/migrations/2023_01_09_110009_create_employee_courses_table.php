<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_courses', function (Blueprint $table) {
               $table->increments('id');
               $table->integer('employeeID');
               $table->integer('courseID')->unsigned();
               $table->foreign('courseID')->references('id')->on('courses');
               $table->boolean('isDeleted');
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
        Schema::dropIfExists('employee_courses');
    }
};
