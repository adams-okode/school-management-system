<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;

class BankAccountController extends Controller
{
    //
    public function CreateAccount(Request $request)
    {
        # code...
        //return $request->all();
        $bank = new \App\BankAccount;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $bank->$key = $value;
        }
        $bank->status = 1;

        //var_dump($bank);
        //return ;

        if ($bank->save()){
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

    public function UpdateAccount(Request $request)
    {
        # code...
        $data=[];
        $bank = \App\BankAccount::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;     
        }

        //return $data;

        if ($bank->update($data)){
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

    public function DeleteAccount(Request $request)
    {
        # code...
        $bank = \App\BankAccount::where('id',$request->id);
        if ($bank->delete()){
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
