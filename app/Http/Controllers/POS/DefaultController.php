<?php

namespace App\Http\Controllers\POS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Supplier;

class DefaultController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        return view('pos.index');

    }

    public function customer_page(Request $request)
    {
        # code...
        $customers = Customer::get();

        return view('pos.customer')->with([
            'customers'=> $customers,
        ]);

    }

    public function supplier_page(Request $request)
    {
        # code...
        $suppliers = Supplier::get();

        return view('pos.supplier')->with([
            'suppliers'=> $suppliers,
        ]);

    }
}
