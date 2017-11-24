<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('course_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');      
            $table->foreign('course_id')
                  ->references('id')->on('courses')
                  ->onDelete('cascade');
            $table->bigInteger('amount')->nullable();      
            $table->string('status',50)->nullable();
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
        //
        Schema::drop('course_fees');
    }
}
