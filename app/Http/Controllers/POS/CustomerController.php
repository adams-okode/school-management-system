<?php

namespace App\Http\Controllers\POS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function Create(Request $request)
    {
        # code...
        $customer = new Customer;

        foreach ($request->all() as $key => $value) {
            if ($key=='_token')continue;
            $customer->$key = $value;
        }

        if ($customer->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'customer record created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'error creating customer record',
            ]);
        }
        

    }

    public function Update(Request $request)
    {
        # code...
        $customer = new Customer;

        foreach ($request->all() as $key => $value) {
            if ($key=='_token')continue;
            $customer->$key = $value;
        }

        if ($customer->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'customer record created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'error creating customer record',
            ]);
        }
    }


    public function Delete(Request $request)
    {
        # code...
        $customer = Customer::where('id',$request->input('id'))->delete();

        if ($customer){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'customer record deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'error deleting customer record',
            ]);
        }

    }

    


}
