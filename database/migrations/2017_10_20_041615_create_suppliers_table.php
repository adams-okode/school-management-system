<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('WorkflowStepID')->nullable();
            $table->string('SupplierMemberTypeID')->nullable();
            $table->string('SupplierName')->nullable();
            $table->string('NationalIDNo')->nullable();
            $table->string('PINNo')->nullable();
            $table->string('CountryID')->nullable();
            $table->string('CountyID')->nullable();
            $table->string('DateofBirth')->nullable();
            $table->string('Gender')->nullable();
            $table->string('MaritalStatus')->nullable();
            $table->string('PostalAddress')->nullable();
            $table->string('PostalCode')->nullable();
            $table->string('Town')->nullable();
            $table->string('CellPhoneNo')->nullable();
            $table->string('AlternativeEmailAddress')->nullable();
            $table->string('Website')->nullable();
            $table->string('LogUserID')->nullable();
            $table->string('LogTime')->nullable();
            $table->string('EmployeeNumber')->nullable();
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
        Schema::drop('suppliers');
    }
}
