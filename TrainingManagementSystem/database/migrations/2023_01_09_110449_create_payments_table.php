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
        Schema::create('payments', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('courseID')->unsigned();
              $table->foreign('courseID')->references('id')->on('courses');
              $table->string('courseDuration');
              $table->integer('courseAmount');
              $table->boolean('isDeleted')->default(0);
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
        Schema::dropIfExists('payments');
    }
};
