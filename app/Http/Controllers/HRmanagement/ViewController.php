<?php

namespace App\Http\Controllers\HRmanagement;

use App\Employee_Category;
use App\Employees;
use App\Units;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departments;

class ViewController extends Controller
{
    public function applications()
    {
        # code...
        $depart = Departments::get();
        return view('Employees.Settings.applications')->with([
            'depart'=> $depart,
        ]);
    }

    public function employee()
    {
        # code...
        $employee = Employees::get();
        $depart = Departments::get();
        return view('Employees.applications')->with([
            'employee'=> $employee,
            'depart'=> $depart,
        ]);
    }

    public function personalinfo($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        $depart = Departments::where('id',$employee->Department_id)->first();
        $category = Employee_Category::get();
        return view('Employees.Settings.personalinfo')->with([
            'employee'=> $employee,
            'depart'=> $depart,
            'category'=> $category,
        ]);
    }

    public function contacts($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        return view('Employees.Settings.contacts')->with([
            'employee'=> $employee,
        ]);
    }

    public function education($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        $unit = Units::get();
        return view('Employees.Settings.Education')->with([
            'employee'=> $employee,
            'unit'=> $unit,
        ]);
    }

    public function accommodation($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        return view('Employees.Settings.Accommodation')->with([
            'employee'=> $employee,
        ]);
    }

    public function category()
    {
        # code...
        return view('Employees.Category');
    }

    public function physical($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        return view('Employees.Settings.Physical')->with([
            'employee'=> $employee,
        ]);
    }

    public function finances($id)
    {
        # code...
        $employee = Employees::where('id',$id)->first();
        return view('Employees.Settings.finances')->with([
            'employee'=> $employee,
        ]);
    }

    public function allemployees(){
        $employee = Employees::get();
        $depart = Departments::get();
        $unit = Units::get();
        $category = Employee_Category::get();
        $data=[];
        $unit_data=[];

        foreach ($employee as $employees){
            $merge = json_decode($employees->Units);
            if($merge==null){
                $merge=[];
            };
            foreach ($merge as $key => $value){
                foreach ($unit as $units){
                    if($units->id == $key){
                        $unit_data[]=$units;
                    }

                }
            }
            $data[]=[
                'units'=>$unit_data,
            ];
        }


        return view('Employees.allemployees')->with([
            'unit'=> json_decode(json_encode($data)),
            'employee'=> $employee,
            'depart'=> $depart,
            'category'=> $category,
        ]);
    }
}
