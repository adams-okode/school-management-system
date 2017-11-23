<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FinanceController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function index(){

    return view('dashboard.finance.index');
    }
    public function suppliers(){

    return view('dashboard.finance.suppliers');
    }
}
