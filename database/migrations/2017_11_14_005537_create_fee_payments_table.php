<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fee_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admission_number');
            $table->foreign('admission_number')
                  ->references('admission_number')->on('students')
                  ->onDelete('cascade');
            $table->string('ref_no');      
            $table->string('receipt_no'); 
            $table->string('bank')->nullable();      
            $table->string('payment_mode');      
            $table->integer('total')->default(0);  
            $table->integer('arrears')->default(0);     

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
        Schema::drop('fee_payments');

    }
}
