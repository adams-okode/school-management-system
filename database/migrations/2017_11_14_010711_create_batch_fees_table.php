<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('batch_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id');
            $table->foreign('batch_id')
                  ->references('id')->on('Batch')
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
        Schema::drop('batch_fees');
    }
}
