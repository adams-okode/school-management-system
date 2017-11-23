<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Batch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Batch_name',250)->nullable();
            $table->string('Batch_code',250)->nullable();
            $table->string('Batch_category',250)->default('INITIAL');
            $table->string('Batch_year')->nullable();
            $table->date('Start_date')->nullable();
            $table->date('End_date')->nullable();
            $table->string('ClassType')->nullable();
            $table->string('ClassStatus')->nullable();
            $table->string('status')->default('1');
            $table->string('course_id');
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
        Schema::drop('Batch');
    }
}
