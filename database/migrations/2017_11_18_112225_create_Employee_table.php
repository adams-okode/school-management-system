<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('First_name',250)->nullable();
            $table->string('Middle_names',250)->nullable();
            $table->string('Last_name',250)->nullable();
            $table->string('Category',250)->nullable();
            $table->string('Gender',250)->nullable();
            $table->date('Dob')->nullable();
            $table->string('Marital_Status')->default('SINGLE');
            $table->string('Nationality')->nullable();
            $table->string('National_id')->nullable();
            $table->string('Postal_address')->nullable();
            $table->string('Mobile_number')->nullable();
            $table->string('Accommodation',250)->nullable();
            $table->string('Email_address', 250)->nullable();
            $table->string('Physical',10)->nullable();
            $table->string('PhysicalDescription',1000)->nullable();
            $table->string('Department_id')->nullable();
            $table->string('Units')->nullable();
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
        Schema::drop('Employees');
    }
}
