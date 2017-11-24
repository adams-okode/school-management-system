<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;

class SettingsController extends Controller
{

    public function settings (){

        return view('Students.Settings');
    }

    public function batches (Request $request)
    {
        $data=[];
        $year = Batch::where('Batch_category',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='id'or $key=='q' or $key=='_token')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            LaravelSweetAlert::setMessage([
                'title' => 'Successful',
                'text' => "Classes Converted Successfully",
                'timer' => 3000,
                'type' => 'success',
                'showConfirmButton' =>false
            ]);
            return redirect()->back();
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                'title' => 'Unsuccessful',
                'text' => "Classes Not Converted",
                'timer' => 4000,
                'type' => 'error',
                'showConfirmButton' =>false
            ]);
            return redirect()->back();
        }
    }
}
