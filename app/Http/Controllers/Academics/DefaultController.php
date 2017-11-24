<?php

namespace App\Http\Controllers\Academics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FinancialYear;

class DefaultController extends Controller
{
    public function index(Request $request)
    {

        # code...
        $years = FinancialYear::where('status',1)->get();

        return view('dashboard.academics2')->with([
            'years'=> $years,
        ]);
    }
}
