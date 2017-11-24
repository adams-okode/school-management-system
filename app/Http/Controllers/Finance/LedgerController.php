<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class LedgerController extends Controller
{
     //
    public function CreateLedger(Request $request)
    {
        # code...
        //return $request->all();
        $ledger = new \App\Ledger;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $ledger->$key = $value;
        }
        $ledger->status = 1;

        if ($ledger->save()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Bank Created!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not create Bank Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }   
    }

    public function UpdateLedger(Request $request)
    {
        # code...
        $data=[];
        $ledger = \App\Ledger::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;     
        }

        //return $data;

        if ($ledger->update($data)){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Bank Updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
            
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not update Bank Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }
    }

    public function DeleteLedger(Request $request)
    {
        # code...
        $ledger = \App\Ledger::where('id',$request->id);
        if ($ledger->delete()){
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Bank deleted!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
           
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Error',
                        'text' => "Could not delete Bank Account!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
            
        }   
    }
}
