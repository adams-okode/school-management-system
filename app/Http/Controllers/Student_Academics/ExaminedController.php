<?php

namespace App\Http\Controllers\Student_Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Courses;
use App\Exams;
use App\Units;
use App\Academic_years;
use App\Batch;;
use App\Marks;
use App\Exam_category;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;

class ExaminedController extends Controller
{
    public function view()
    {
        # code...
        $students = Students::get();
        $course = Courses::get();
        $batch = Batch::get();
        return view('Student_Academics.Examined')->with([
            'student'=> $students,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }

    public function particular($id)
    {
        # code...
        $students = Students::where('id','=',$id)->first();
        $course = Courses::where('id','=',$students->course_id)->first();
        $batch = Batch::where('id', '=', $students->batch_id)->first();
        $unit = Units::get();
        $exam = Exams::where('Course_id',$course->id);
        $mark = Marks::where('Student_id',$students->id)->first();
        $data=[];
        $unit_data=[];
        $marks_data=[];
        $exams = Exams::get();
        $academics = Academic_years::get();


            $merge = json_decode($mark->Results);
            if($merge==null){
                $merge=[];
            };
            foreach ($merge as $key => $value){
                foreach ($unit as $units){
                    if($units->id == $key){
                        $unit_data[]=$units;
                        $marks_data[]=$value;
                    }

                }
            }
            $data[]=[
                'course_name'=>$course->course_name,
                'units'=>$unit_data,
                'marks'=>$marks_data
            ];


        return view('Student_Academics.Layouts.ExaminedLayout.Particular')->with([
            'course'=> json_decode(json_encode($data)),
            'student'=> $students,
            'batch'=> $batch,
            'exam'=> $exams,
            'academic'=> $academics,
        ]);
    }

    public function check(Request $request)
    {
        # code...
        $students = Students::where('id','=',$request->student)->first();
        $course = Courses::where('id','=',$students->course_id)->first();
        $batch = Batch::where('id', '=', $students->batch_id)->first();
        $unit = Units::get();
        $exam = Exams::where('id',$request->id)->first();
        $mark = Marks::where('Student_id',$students->id)->where('Exam_id',$exam->id)->first();
        $data=[];
        $unit_data=[];
        $marks_data=[];
        $exams = Exams::get();
        $academics = Academic_years::get();


        $merge = json_decode($mark->Results);
        if($merge==null){
            $merge=[];
        };
        foreach ($merge as $key => $value){
            foreach ($unit as $units){
                if($units->id == $key){
                    $unit_data[]=$units;
                    $marks_data[]=$value;
                }

            }
        }
        $data[]=[
            'course_name'=>$course->course_name,
            'units'=>$unit_data,
            'marks'=>$marks_data
        ];


        return view('Student_Academics.Layouts.ExaminedLayout.ParticularExam')->with([
            'course'=> json_decode(json_encode($data)),
            'student'=> $students,
            'batch'=> $batch,
            'exam'=> $exams,
            'exams'=> $exam,
            'courses'=> $course,
            'academic'=> $academics,
        ]);
    }
}
