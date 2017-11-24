<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Primary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Application_id')->nullable();
            $table->string('Employee_id')->nullable();
            $table->string('School',400)->nullable();
            $table->date('Date_Started')->nullable();
            $table->date('Date_Finished')->nullable();
            $table->string('Certificates')->nullable();
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
        Schema::drop('Primary');
    }
}
