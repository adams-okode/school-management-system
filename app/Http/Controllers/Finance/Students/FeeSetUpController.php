<?php

namespace App\Http\Controllers\Finance\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;




class FeeSetUpController extends Controller
{
    //
    public function SetFeeItems(Request $request)
    {
        # code...
        $tables=['fee_payments','batch_fees','course_fees'];
        foreach ($request->all() as $key1 => $value1) {
            //creating objects excluding the _token
            if ($key1=='_token'||$value1=='')continue;
            foreach ($tables as $key => $value) {
                 # code...
                Schema::table($value, function(Blueprint $table) use ($value1)
                {
                    $table->integer($value1)->default(0);
                });
            }
        }  
        LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Item Set",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();  
    }

    public function SetCourseFee(Request $request)
    {
        //return $request->all();
        $fee = new \App\CourseFee;
        $data=[];
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $fee->$key = $value;
            
            $data[]=$value;
        }
        $fee->amount=array_sum($data)-(int)$request->course_id;
        $fee->status = 1;

        if ($fee->save()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Fee Set!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not set Fee!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } 
    }


    public function SetBatchFee(Request $request)
    {
        //return $request->all();
        $fee = new \App\BatchFee;
        $data=[];
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $fee->$key = $value;
            $data[]=$value;
        }
        $fee->amount=array_sum($data)-(int)$request->batch_id;
        $fee->status = 1;

        if ($fee->save()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Fee Set!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not set Fee!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } 
    }


    public function RemoveFeeItem(Request $request)
    {
        # code...
        $tables=['fee_payments','batch_fees','course_fees'];
        
        foreach ($tables as $key => $value) {
                 # code...
            Schema::table($value, function(Blueprint $table) use($request)
            {
                $table->dropColumn([$request->name]);
            });
        }

        LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Item Removed",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
          
    }
}
