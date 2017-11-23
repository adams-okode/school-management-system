<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
use Auth;
use App\User;
class HomeController extends Controller
{
   public function index(){
   return view('login');
	}
	public function signin(Request $request){
     $this->validate($request,[
  'username'=>'required',
  'password'=>'required',
     ]);
     $username=$request->username;
     $password=$request->password;
         if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }
      LaravelSweetAlert::setMessage([
                        'title' => 'Login Error',
                        'text' => "The system could not log you in, try again!",
                        'timer' => 3000,
                        'type' => 'error',
                        'showConfirmButton' =>true
      ]);
      return redirect()->back();
	}

	public function register(){
		return view('register');
	}
     public function signup(Request $request){
     $this->validate($request,[
  'name'=>'required',
  'username'=>'required|unique:users',
  'email'=>'required|unique:users|email',
  'password'=>'required|confirmed',
     ]);
     $user=new User();
     $user->name=$request->name;
     $user->username=$request->username;
     $user->email=$request->email;
     $user->password=bcrypt($request->password);
     $user->save();
     LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "User succesfully created! can now login",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
     return redirect('/');
	     }

	 public function getLogout()
    {
     Auth::logout();
     return redirect('/');

    }
    
}
