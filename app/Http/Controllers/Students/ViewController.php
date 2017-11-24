<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Applications;
use App\Courses;
use App\Batch;


class ViewController extends Controller
{
    public function personalinfo($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        $course = Courses::get();
        $batch = Batch::get();
        return view('Students.Settings.personalinfo')->with([
            'application'=> $app,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }

    public function contacts($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        return view('Students.Settings.contacts')->with([
            'application'=> $app,
        ]);
    }

    public function education($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        return view('Students.Settings.Education')->with([
            'application'=> $app,
        ]);
    }

    public function parent($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        return view('Students.Settings.Parent')->with([
            'application'=> $app,
        ]);
    }

    public function listapp()
    {
        # code...
        $app = Applications::get();
        $course = Courses::get();
        return view('Students.applications')->with([
            'application'=> $app,
            'course'=> $course,
        ]);
    }

    public function physical($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        return view('Students.Settings.Physical')->with([
            'application'=> $app,
        ]);
    }

    public function finances($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        return view('Students.Settings.Finances')->with([
            'application'=> $app,
        ]);
    }

    public function process($id)
    {
        # code...
        $app = Applications::where('id',$id)->first();
        $batch = Batch::where('id',$app->batch_id)->first();
        $course = Courses::where('id',$app->course_id)->first();
        return view('Students.Settings.Process')->with([
            'application'=> $app,
            'course'=> $course,
            'batch'=> $batch,
        ]);
    }
}
