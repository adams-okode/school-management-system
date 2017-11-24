<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Academic_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',1000)->nullable();
            $table->date('Start_date')->nullable();
            $table->date('End_date')->nullable();
            $table->string('Status',400)->nullable();
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
        Schema::drop('Academic_years');
    }
}
