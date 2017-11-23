<?php

namespace App\Http\Controllers\HRmanagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employees;
use App\Primary;
use App\HighSchool;
use App\Tertiary;
use App\Documents;
use App\Employee_Category;
use App\Departments;
use App\Units;
use App\User;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    public function employee(){

        $employees = Employees::get();
        $department = Departments::get();
        $unit = Units::get();
        return view('Employees.Employees')->with([
            'employee'=> $employees,
            'depart'=> $department,
            'unit'=> $unit,
        ]);
    }

    public function create(Request $request)
    {
        switch ($q = $request->Input('q')){
            case 0:
                $year = new Employees();
                foreach ($request->all() as $key => $value) {
                    //creating objects excluding the _token
                    if ( $key=='q' || $key=='_token')continue;
                    $year->$key = $value;
                }

                if ($year->save()){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Employee Created",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect('HR/employees');
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Employee not Created",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 1:
                $data=[];
                $year = Employees::where('id',$request->id);
                foreach ($request->all() as $key => $value) {
                    //creating array excluding the _token the array will be used for update
                    if ($key=='id'or $key=='q' or $key=='_token')continue;
                    $data[$key]=$value;
                }

                if ($year->update($data)){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 2:
                $data=[];
                $year = Employees::where('id',$request->id);
                foreach ($request->all() as $key => $value) {
                    //creating array excluding the _token the array will be used for update
                    if ($key=='id'or $key=='q' or $key=='_token')continue;
                    $data[$key]=$value;
                }

                if ($year->update($data)){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 3:
                $app = Employees::where('id', $request->input('Employee_id'))->first();
                $name = $app->Middle_names;
                $name2 = $app->Last_name;
                $id = $app->id;
                $files=$request->Documents;
                $destinationPath = public_path().'/Employees/Primary/';
                foreach ($files as $file) {

                    //creating objects excluding the _token
                    $year = new Documents;
                    $filename = $name.''.$name2.''.date('YmdHis').''.rand(5, 15).''.$file->getClientOriginalExtension();
                    $file->move($destinationPath, $filename);
                    $year->Documents= $filename;
                    $year->Employee_id=$id;
                    $year->Category=$app->Category;
                    $year->Application_id=Null;
                    $year->Type='PRIMARY';

                    $year->save();
                }

                $primary = new Primary;
                foreach ($request->all() as $key1 => $value1) {
                    //creating objects excluding the _token
                    if ( $key1=='q' or $key1=='Documents' or $key1=='_token')continue;
                    $primary->$key1 = $value1;
                }

                if ( $primary->save()){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details Saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }
                break;

            case 4:
                $app = Employees::where('id', $request->input('Employee_id'))->first();
                $name = $app->Middle_names;
                $name2 = $app->Last_name;
                $id = $app->id;
                $files=$request->Documents;
                $destinationPath = public_path().'/Employees/HighSchool/';
                foreach ($files as $file) {

                    //creating objects excluding the _token
                    $filename = $name.''.$name2.''.date('YmdHis').''.rand(5, 15).''.$file->getClientOriginalExtension();
                    $file->move($destinationPath, $filename);
                    $year = new Documents;
                    $year->Documents= $filename;
                    $year->Employee_id=$id;
                    $year->Application_id=Null;
                    $year->Category=$app->Category;
                    $year->Type='HIGHSCHOOL';

                    $year->save();
                }

                $high = new HighSchool;
                foreach ($request->all() as $key1 => $value1) {
                    //creating objects excluding the _token
                    if ( $key1=='q' or $key1=='Documents' or $key1=='_token')continue;
                    $high->$key1 = $value1;
                }

                if ( $high->save()){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details Saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 5:
                $app = Employees::where('id', $request->input('Employee_id'))->first();
                $name = $app->Middle_names;
                $name2 = $app->Last_name;
                $id = $app->id;
                $files=$request->Documents;
                $destinationPath = public_path().'/Employees/Tertiary/';
                foreach ($files as $file) {

                    //creating objects excluding the _token
                    $filename = $name.''.$name2.''.date('YmdHis').''.rand(5, 15).''.$file->getClientOriginalExtension();
                    $file->move($destinationPath, $filename);
                    $year = new Documents;
                    $year->Documents= $filename;
                    $year->Employee_id=$id;
                    $year->Application_id=Null;
                    $year->Category=$app->Category;
                    $year->Type='TERTIARY';

                    $year->save();
                }

                $Tertiary = new Tertiary;
                foreach ($request->all() as $key1 => $value1) {
                    //creating objects excluding the _token
                    if ( $key1=='q' or $key1=='Documents' or $key1=='_token')continue;
                    $Tertiary->$key1 = $value1;
                }

                if ( $Tertiary->save()){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details Saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;
            case 6:
                $data=[];
                $year = Employees::where('id',$request->id);
                foreach ($request->all() as $key => $value) {
                    //creating array excluding the _token the array will be used for update
                    if ($key=='id'or $key=='q' or $key=='_token')continue;
                    $data[$key]=$value;
                }

                if ($year->update($data)){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 7:
                $data=[];
                $year = Employees::where('id',$request->id);
                foreach ($request->all() as $key => $value) {
                    //creating array excluding the _token the array will be used for update
                    if ($key=='id'or $key=='q' or $key=='_token')continue;
                    $data[$key]=$value;
                }

                if ($year->update($data)){
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 8:
                $data=[];
                $year = Employees::where('id',$request->id)->first();
                foreach ($request->all() as $key => $value) {
                    //creating array excluding the _token the array will be used for update
                    if ($key=='id'or $key=='q' or $key=='_token')continue;
                    $data[$key]=$value;
                }

                if ($year->update($data)){
                    # code...
                    $user = new User;
                    $user->name = $year->First_name;
                    $user->username = $year->Last_name;
                    $user->email = $year->Email_address;
                    $user->avatar = 'user.png';
                    $user->password = bcrypt($key->Email_address);

                    $user->save();

                    LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Details saved",
                        'timer' => 3000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    return redirect('HR/allemployees');
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

            case 9:
                if (Employees::where('id', '=',$request->id)->first()) {
                    $units= json_encode($request->Units);

                    $user = Employees::where('id', '=', $request->id);
                    $default = Employees::where('id', '=', $request->id)->first();

                    if ($units == '') {
                        $user->update(array(
                            'Units' => $default->Units,
                        ));
                    } else if ($units != '') {
                        $user->update(array(
                            'Units' => $units,
                        ));
                    }
                        # code...
                        LaravelSweetAlert::setMessage([
                            'title' => 'Successful',
                            'text' => "Details saved",
                            'timer' => 3000,
                            'type' => 'success',
                            'showConfirmButton' =>false
                        ]);
                        return redirect()->back();
                } else {
                    # code...
                    LaravelSweetAlert::setMessage([
                        'title' => 'Unsuccessful',
                        'text' => "Details not saved",
                        'timer' => 4000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
                    return redirect()->back();
                }

                break;

        }


    }

    public function creation(Request $request){
        $year = new Employee_Category();
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ( $key=='q' || $key=='_token')continue;
            $year->$key = $value;
        }

        if ($year->save()){
            # code...
            LaravelSweetAlert::setMessage([
                'title' => 'Successful',
                'text' => "Employee Category Created",
                'timer' => 3000,
                'type' => 'success',
                'showConfirmButton' =>false
            ]);
            return redirect('HR/');
        } else {
            # code...
            LaravelSweetAlert::setMessage([
                'title' => 'Unsuccessful',
                'text' => "Employee Category not Created",
                'timer' => 4000,
                'type' => 'error',
                'showConfirmButton' =>false
            ]);
            return redirect()->back();
        }
    }

    public function delete($id){
        $employee = Employees::where('id',$id)->first();

        $employee->delete();
        return redirect('HR/');
    }
}
