<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Student_id');
            $table->string('Exam_id')->nullable();
            $table->string('Academic_year')->nullable();
            $table->string('Semester')->nullable();
            $table->string('Results')->nullable();
            $table->string('Unit_id');
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
        Schema::drop('Marks');
    }
}
