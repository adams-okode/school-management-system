<?php

namespace App\Http\Controllers\Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\courses;
use App\school;
use App\college;
use App\campus;
use App\Departments;
use App\Units_for_courses;

class CourseController extends Controller
{
    public function course()
    {
        # code...
        $course = courses::get();
        $school = school::get();
        $college = college::get();
        $campus = campus:: get();
        $depart = Departments:: get();

        return view('Academics2.course')->with([
            'course'=> $course,
            'depart'=> $depart,
            'school'=> $school,
            'college' => $college,
            'campus' => $campus,
        ]);

    }

    public function create(Request $request)
    {
        $year = new courses;
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
        $course = Courses::get();
        $units = Units_for_courses:: get();

        $year = courses::where('id',$id);
        if ($year){
            # code...
                foreach ($course as $key){
                    foreach ($units as $key2){
                        if($key->id == $key2->course_id){
                            $key2->delete();
                            $year->delete();

                        }

                    }
                }
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Course Could Not Be Deleted',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $year = courses::where('id',$request->id);
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
