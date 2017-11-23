<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class CurrenciesController extends Controller
{
    //
     public function CreateCurrency(Request $request)
    {
        # code...
        //return $request->all();
        $Currency = new \App\Currency;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $Currency->$key = $value;
        }
        $Currency->status = 1;

        if ($Currency->save()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Vote Created!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not create Vote Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }   
    }

    public function UpdateCurrency(Request $request)
    {
        # code...
        $data=[];
        $Currency = \App\Currency::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;     
        }

        //return $data;

        if ($Currency->update($data)){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Vote Updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
            
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not update Vote Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }
    }

    public function DeleteCurrency(Request $request)
    {
        # code...
        $Currency = \App\Currency::where('id',$request->id);
        if ($Currency->delete()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Vote deleted!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
           
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not delete Vote Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
            
        }   
    }
}
