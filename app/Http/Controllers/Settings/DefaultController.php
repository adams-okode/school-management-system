<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\FinancialYear;


class DefaultController extends Controller
{
    //
    public function users(Request $request)
    {
        # code...
        $users=User::all();
        $roles=Role::all();
        return view('dashboard.users',['users'=>$users,'roles'=>$roles]);
    }

    public function academics()
    {
        # code...
        $years = FinancialYear::where('status',1)->get();

        return view('dashboard.academics')->with([
            'years'=> $years,
        ]);
    }

}
