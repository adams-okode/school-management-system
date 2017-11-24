<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\campus;
class CampusController extends Controller
{
    public function campus()
    {
        # code...
        $campus = Campus::get();

        return view('Academics.campus')->with([
            'campus'=> $campus,
        ]);

    }

    public function create(Request $request)
    {
        $year = new Campus;
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

    public function update(Request $request)
    {
        # code...
        $data=[];
        $year = Campus::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Campus Details Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Campus Details Could Not Be Updated',
            ]);
        }
    }

    public function enabling(Request $request)
    {
        # code...

        $id = $request->input('id');
        $status = $request->input('status');

        If(campus::where('id',$id)){
            $default = campus::where('id', '=', $id)->first();

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
}
