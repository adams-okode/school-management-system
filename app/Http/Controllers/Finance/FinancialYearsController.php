<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FinancialYear;


class FinancialYearsController extends Controller
{
    /*
    *create finacial year
    */
    public function CreateYear(Request $request)
    {
        $year = new FinancialYear;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $year->$key = $value;
        }
        $year->status = 1;

        if ($year->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Financial Year Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Financial Year Could Not Be Created',
            ]);
        }   
    }



    /*
    *update years
    */
    public function UpdateYear(Request $request)
    {
        # code...
        $data=[];
        $year = FinancialYear::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$year->$key]=$value;     
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Financial Year Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Financial Year Could Not Be Updated',
            ]);
        }   

        


    }



    /*
    *deleting the financial year
    
    */
    public function DeleteYear(Request $request)
    {
        # code...
        $year = FinancialYear::where('id',$id);
        if ($year->delete()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Financial Year Delete',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Financial Year Could Not Be Deleted',
            ]);
        }   
    }
}
