<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Courses;
use App\Applications;
use App\Batch;
use Illuminate\Support\Facades\Input;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
use App\Primary;
use App\HighSchool;
use App\Tertiary;
use App\Documents;

class ContinuingController extends Controller
{
    public function Continuing()
    {
        # code...
        $students = Students::get();
        $course = Courses::get();
        $batch = Batch::get();
        return view('Students.Continuing')->with([
            'student'=> $students,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }

    public function view($id)
    {
        # code...
        $students = Students::where('id',$id)->get()->first();
        $course = Courses::get();
        $batch = Batch::get();
        return view('Students.Settings.ContinuingLayout.View')->with([
            'student'=> $students,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }

    public function action(Request $request)
    {
        if (Students::where('id',$request->id)) {
            $data = [];
            $year = Students::where('id', $request->id);
            foreach ($request->all() as $key => $value) {
                //creating array excluding the _token the array will be used for update
                if ($key == 'id' or $key == 'q' or $key == '_token') continue;
                $data[$key] = $value;
            }

            if ($year->update($data)) {
                # code...
                LaravelSweetAlert::setMessage([
                    'title' => 'Successful',
                    'text' => "Action Successful",
                    'timer' => 3000,
                    'type' => 'success',
                    'showConfirmButton' => false
                ]);
                $students = Students::get();
                $course = Courses::get();
                $batch = Batch::get();
                return redirect('students/continue')->with([
                    'student'=> $students,
                    'course'=> $course,
                    'batch'=> $batch,
                ]);
            } else {
                # code...
                LaravelSweetAlert::setMessage([
                    'title' => 'Action Not Unsuccessful',
                    'text' => "Details not saved",
                    'timer' => 4000,
                    'type' => 'error',
                    'showConfirmButton' => false
                ]);
                return redirect()->back();
            }
        }

    }

}
