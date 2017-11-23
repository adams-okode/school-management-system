<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Type')->nullable();
            $table->string('Category')->nullable();
            $table->string('Application_id')->nullable();
            $table->string('Employee_id')->nullable();
            $table->string('Documents')->nullable();
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
        Schema::drop('Documents');
    }
}
