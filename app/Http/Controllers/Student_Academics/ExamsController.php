<?php

namespace App\Http\Controllers\Student_Academics;

use App\Units_for_courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Courses;
use App\Exams;
use App\Units;
use App\Academic_years;
use App\Batch;
use App\Marks;
use App\Exam_category;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class ExamsController extends Controller
{
    public function view()
    {
        # code...
        $students = Students::get();
        $course = Courses::get();
        $batch = Batch::get();
        return view('Student_Academics.Students')->with([
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
        $academic = Academic_years::get();
        $exam = Exams::get();
        return view('Student_Academics.Layouts.ParticularStudent')->with([
            'student'=> $students,
            'course'=> $course,
            'batch'=> $batch,
            'exam'=> $exam,
            'academic'=> $academic,
        ]);
    }

    public function create(){
        $category = Exam_category::get();
        $course = Courses::get();
        $academic = Academic_years::get();
        $unit = Units::get();


        return view('Student_Academics.Exams')->with([
            'category'=> $category,
            'course'=> $course,
            'academic'=> $academic,
            'unit'=> $unit,
        ]);
    }

    public function category(){
        $category = Exam_category::get();
        $course = Courses::get();

        return view('Student_Academics.Category')->with([
            'category'=> $category,
            'course'=> $course,
        ]);
    }

    public function academic(){

        return view('Student_Academics.Academic');
    }

    public function creation(Request $request){
        switch ($q = $request->Input('q')) {
            case 0:

                $units= $request->Units;
                $year = new Exams;
                $year->Units = json_encode($units);

                foreach ($request->all() as $key => $value) {
                    //creating objects excluding the _token
                    if ($key == 'q' || $key == '_token' || $key == 'Units') continue;
                    $year->$key = $value;
                }

                if ($year->save()) {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Exam Created Successfully",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' => false
                    ]);
                    return redirect('studentacademics/');
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Exam Unsuccessfully Created",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                }

                break;

            case 1:
                $year = new Exam_category();
                foreach ($request->all() as $key => $value) {
                    //creating objects excluding the _token
                    if ($key == 'q' || $key == '_token') continue;
                    $year->$key = $value;
                }

                if ($year->save()) {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Exam Category created successfully",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Exam Category Unsuccessfully Created",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                }

                break;

            case 2:
                $year = new Academic_years();
                foreach ($request->all() as $key => $value) {
                    //creating objects excluding the _token
                    if ($key == 'q' || $key == '_token') continue;
                    $year->$key = $value;
                }

                if ($year->save()) {
                    # code...
                    $student = Students::where('Academic_Status','=', 'PROCEED');
                        $student->update(array(
                            'Exam_Status' => '0',
                        ));
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Academic Year created successfully",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Academic Year Unsuccessfully Created",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                }

                break;

            case 3:
                $examiner = Exams::where('id',$request->id)->first();

                $units= json_decode($examiner->Units);
                $students = Students::where('id','=',$request->student)->first();
                $studentcourse = Courses::where('id','=',$students->course_id)->first();
                $batch = Batch::where('id', '=', $students->batch_id)->first();
                $academician = Academic_years::where('id',$examiner->Academic_year)->first();
                $academic = Academic_years::get();
                $exam = Exams::get();

                $unit = Units::get();

                return view('Student_Academics.Layouts.ViewExam')->with([
                    'depart'=> $units,
                    'unitdepart'=> $unit,
                    'student'=> $students,
                    'studentcourse'=> $studentcourse,
                    'batch'=> $batch,
                    'exam'=> $exam,
                    'examiner'=> $examiner,
                    'academic'=> $academic,
                    'academician'=> $academician,
                ]);

                break;

            case 4:
                $year = new Marks;
                $data = [];
                $build = [];
                foreach ($request->all() as $key => $value) {
                    //creating objects excluding the _token
                    if ($key == 'q' || $key == '_token' || $key == 'Student_id' || $key == 'Semester' || $key == 'Academic_year' || $key == 'Exam_id') continue;
                    $data[$key]=$value;
                }
                $exam = Exams::where('id',$request->Exam_id)->first();

                foreach ($data as $key=> $value){
                    $build[$key]=($value/$exam->out_of)*100;
                }

                $year->Results =json_encode($build);
                $year->Student_id=$request->Student_id;
                $year->Academic_year=$request->Academic_year;
                $year->Semester=$request->Semester;
                $year->Exam_id=$request->Exam_id;

                if ($year->save()) {
                    # code...
                    /*
                    $student = Students::where('id',$request->Student_id)->first();
                    $status = 1;
                    if ($status != '') {
                        $student->update(array(
                            'Exam_Status' => $status,
                        ));
                    }
                    */
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Marks Recorced Successfully",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' => false
                    ]);
                    return redirect('studentacademics/students/view/'.$request->Student_id);
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Marks Not Recorced Successfully",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                }

                break;

            case 5:
                $category = Exam_category::get();
                $data =[];

                /**
                 **build array for student marks for each exam category
                 **{CAT:{'marks':{1:20,2:30}},}

                 **/
                foreach ($category as $categories){

                    $mark = Marks::where('Student_id',$request->student)->where('Academic_year',$request->Academic_year)->get();
                    foreach ($mark as $key => $value){

                        $data[$categories->Name] = [
                            'marks'=>json_decode($value->Results),
                            'percentage'=>$categories->Percentage
                        ];

                    }
                }

                /*
                    loop through the values to calcuate the
                    totals as a value of the set percentage
                */
                $sub_totals=[];
                foreach ($data as $key1 => $value1) {
                    # code...
                    foreach ($value1['marks'] as $key2 => $value2) {
                        # code...
                        $sub_totals[$key2][]=$value2*0.01*$value1['percentage'];

                    }
                }


                $total=[];
                foreach ($sub_totals as $key => $value) {
                    # code...
                    $unit=\App\Units::where('id',$key)->first();
                    $total[$unit->id]=array_sum($value);

                }

                return $total;

                if ($year->save()) {
                    # code...
                    /*
                    $student = Students::where('id',$request->Student_id)->first();
                    $status = 1;
                    if ($status != '') {
                        $student->update(array(
                            'Exam_Status' => $status,
                        ));
                    }
                    */
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Marks Recorced Successfully",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' => false
                    ]);
                    return redirect('studentacademics/students/view/'.$request->Student_id);
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Marks Not Recorced Successfully",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' => false
                    ]);
                    return redirect()->back();
                }

                break;
        }
    }
}
