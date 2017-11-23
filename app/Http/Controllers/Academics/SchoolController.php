<?php

namespace App\Http\Controllers\Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\school;
use App\college;
use App\campus;

class SchoolController extends Controller
{
    public function school()
    {
        # code...
        $school = school::get();
        $college = college::get();
        $campus = campus:: get();

        return view('Academics2.school')->with([
            'school'=> $school,
            'college' => $college,
            'campus' => $campus,
        ]);

    }

    public function create(Request $request)
    {
        $year = new school;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $year->$key = $value;
        }
        $year->status = 1;

        if ($year->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Campus Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Campus Could Not Be Created',
            ]);
        }
    }

    public function enabling(Request $request)
    {
        # code...

        $id = $request->input('id');
        $status = $request->input('status');

        If(school::where('id',$id)){
            $default = school::where('id', '=', $id)->first();

            if ($status != '') {
                $default->update(array(
                    'status' => $status,
                ));
            }
            return redirect()->back()->withErrors([
                'Success' => 'Successfully disabled',
            ]);
        } else {

            return redirect()->back()->withErrors([
                'error' => 'The college could not be disabled',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $year = school::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'College Details Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'College Details Could Not Be Updated',
            ]);
        }
    }
}
