<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\User;
use DB;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function dashboard(){
    	$users=User::all();
        $roles=Role::all();
    	return view('dashboard.index',['users'=>$users,'roles'=>$roles]);
    }


    public function adduser(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required',
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        $user->attachRole(Role::where('name','superadmin')->first());
        LaravelSweetAlert::setMessage([
                            'title' => 'Successful',
                            'text' => "User succesfully created!",
                            'timer' => 2000,
                            'type' => 'success',
                            'showConfirmButton' =>false
                        ]);
        return redirect('/dashboard');
    }

    public function editUser($id){
        $user=User::find($id);
        $roles=Role::all();
        $role_users = $user->roles()->pluck('id','id')->toArray();
        return view('dashboard.editUser',['user'=>$user,'roles'=>$roles,'role_users'=>$role_users]);
    }
    

    public function updateUser(Request $request, $id){
        $user=User::find($id);
        $roles=$request->roles;
        DB::table('role_user')->where('user_id',$id)->delete();
        if($roles==""){
            LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }else{
            foreach ($roles as $key=>$value){
                $user->attachRole($value);
            }
             LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
            return redirect()->back();
        }
    }


    public function deleteUser($id){
    	$user=User::find($id);
        DB::table('role_user')->where('user_id',$id)->delete();
        $user->delete();
        LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "User Deleted!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
    	
    }


    public function profile(){
    	$user=Auth::user();
    	return view('dashboard.profile',['user'=>$user]);
    }

    public function updateProfile(Request $request){
    	
    }

    public function settings(){
    	$user=Auth::user();
    	return view('dashboard.settings',['user'=>$user]);
    }

    public function updateSettings(Request $request){
    	
    }

}
