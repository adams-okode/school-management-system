<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Courses;
use App\Batch;
use App\Departments;
use PDF;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;

class ReportsController extends Controller
{
    public function reports()
    {
        # code...
        return view('Students.reports');
    }

    public function all()
    {
        # code...
        $students = Students::get();
        $course = Courses::get();
        $batch = Batch::get();

        return view('Students.PDF.Allstudents')->with([
            'student'=> $students,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }

    public function students(){

        $student = Students::get();
        $course = Courses::get();
        $batch = Batch::get();

        $pdf = PDF::loadView('Students.PDF.Allstudents', compact('student','course','batch'));
        return $pdf->download('AllStudents.pdf');
    }

    public function search (Request $request){

        switch ($q = $request->Input('q')) {
            case 0:
                $batch = Batch::where('Batch_name','=',$request->search)->first();
                $students = Students::where('batch_id','=',$batch->id)->get();
                $course = Courses::where('id','=',$batch->course_id)->first();

               $pdf = PDF::loadView('Students.PDF.BatchStudents', [
                      'students'=>$students,
                       'course'=>$course,
                       'batch'=>$batch
                       ]);
               return $pdf->download($batch->Batch_name.'.pdf');
                break;

            case 1:
                $course = Courses::where('course_name','=',$request->search)->first();
                $batch = Batch::where('course_id', '=', $course->id)->first();
                $students = Students::where('course_id','=',$course->id)->get();

                $pdf = PDF::loadView('Students.PDF.CourseStudents', [
                    'students'=>$students,
                    'course'=>$course,
                    'batch'=>$batch,
                ]);
                return $pdf->download($course->course_name.'.pdf');

                break;

            case 2:
                $department = Departments::where('department_name','=',$request->search)->first();
                $course = Courses::where('department_id', '=', $department->id)->first();
                $batch = Batch::where('course_id', '=', $course->id)->first();
                $students = Students::where('course_id','=',$course->id)->get();

                $pdf = PDF::loadView('Students.PDF.DepartmentStudent', [
                    'students'=>$students,
                    'depart'=>$department,
                    'course'=>$course,
                    'batch'=>$batch,
                ]);
                return $pdf->download($department->department_name.'.pdf');

                break;
        }
    }
}
