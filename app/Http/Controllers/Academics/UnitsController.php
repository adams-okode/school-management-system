<?php

namespace App\Http\Controllers\Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Courses;
use App\School;
use App\College;
use App\Campus;
use App\Departments;
use App\Units;
use App\Units_for_courses;

class UnitsController extends Controller
{
    public function units()
    {
        # code...
        $course = Courses::get();
        $school = School::get();
        $college = College::get();
        $campus = Campus:: get();
        $depart = Departments:: get();
        $units = Units:: get();

        return view('Academics2.Units')->with([
            'unit'=> $units,
            'course'=> $course,
            'depart'=> $depart,
            'school'=> $school,
            'college' => $college,
            'campus' => $campus,
        ]);

    }

    public function create(Request $request)
    {
        $year = new Units;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $year->$key = $value;
        }
        $year->status = 1;

        if ($year->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Could Not Be Created',
            ]);
        }
    }

    public function delete($id)
    {
        # code...
        $year = Units::where('id',$id);
        if ($year->delete()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Deleted Could Not Be Deleted',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $year = Units::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Details Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Details Could Not Be Updated',
            ]);
        }
    }

    public function units_course()
    {
        # code...
        $course = Courses::get();
        $school = School::get();
        $college = College::get();
        $campus = campus:: get();
        $depart = Departments:: get();
        $units = Units_for_courses:: get();

        return view('Academics2.Units_courses')->with([
            'unit'=> $units,
            'course'=> $course,
            'depart'=> $depart,
            'school'=> $school,
            'college' => $college,
            'campus' => $campus,
        ]);

    }

    public function create_course(Request $request)
    {
        $year = new Units_for_courses;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token')continue;
            $year->$key = $value;
        }
        $year->Status = 1;

        if ($year->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Could Not Be Created',
            ]);
        }
    }

    public function delete_course($id)
    {
        # code...
        $year = Units_for_courses::where('id',$id);
        if ($year->delete()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Deleted Could Not Be Deleted',
            ]);
        }
    }

    public function update_course(Request $request)
    {
        # code...
        $data=[];
        $year = Units_for_courses::where('id',$request->id);
        foreach ($request->all() as $key => $value) {
            //creating array excluding the _token the array will be used for update
            if ($key=='_token'||$key=='id')continue;
            $data[$key]=$value;
        }

        if ($year->update($data)){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Course Details Updated',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Details Could Not Be Updated',
            ]);
        }
    }
}
