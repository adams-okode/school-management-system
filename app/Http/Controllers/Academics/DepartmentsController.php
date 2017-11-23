<?php

namespace App\Http\Controllers\Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\school;
use App\college;
use App\campus;
use App\Departments;
use App\Courses;
use App\Units_for_courses;
use App\Units;

class DepartmentsController extends Controller
{
    public function department()
    {
        # code...
        $school = school::get();
        $college = college::get();
        $campus = campus:: get();
        $depart = Departments:: get();

        return view('Academics2.depart')->with([
            'school'=> $school,
            'college' => $college,
            'campus' => $campus,
            'depart' => $depart,
        ]);

    }

    public function create(Request $request)
    {
        $year = new Departments;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $year->$key = $value;
        }
        $year->status = 1;

        if ($year->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Department Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Department Could Not Be Created',
            ]);
        }
    }

    public function delete($id)
    {
        # code...

        $course = Courses::get();
        $units = Units_for_courses:: get();
        $depart = Departments:: get();
        $units2 = Units:: get();

        $year = Departments::where('id',$id);
        if ($year){
            # code...
            foreach ($depart as $key){
                foreach ($units2 as $key3){
                    foreach ($course as $key1){
                        foreach ($units as $key2){
                            if($key1->id == $key2->course_id){
                                $key2->delete();
                                if($key->id == $key1->department_id){
                                    $key1->delete();
                                    if($key->id == $key3->department_id){
                                        $key3->delete();
                                        $year->delete();

                                    }

                                }

                            }

                        }
                    }
                }
            }


        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Department Deleted Could Not Be Deleted',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $year = Departments::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Department Details Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Department Details Could Not Be Updated',
            ]);
        }
    }
}
