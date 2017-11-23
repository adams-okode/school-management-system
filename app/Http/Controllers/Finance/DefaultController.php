<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Supplier;
use App\Invoice;
use App\FinancialYear;

class DefaultController extends Controller
{
    

    public function index(Request $request)
    {
        # code...
        $years = FinancialYear::where('status',1)->get();
        $banks = \App\BankAccount::get();
        $currencies = \App\Currency::get();
        $ledgers = \App\Ledger::get();
        $voteheads = \App\Votehead::get();

        return view('finance.index')->with([
            'years'=> $years,
            'modes'=>[],
            'ledgers'=>$ledgers,
            'voteheads'=>$voteheads,
            'c_categories'=>[],
            'currencies'=>$currencies,
            'banks'=>$banks,
        ]);
    }



    public function customer_page(Request $request)
    {
        # code...
        $customers = Customer::get();

        return view('finance.customer')->with([
            'customers'=> $customers,
        ]);

    }


    public function supplier_page(Request $request)
    {
        # code...
        $suppliers = Supplier::get();

        return view('finance.supplier')->with([
            'suppliers'=> $suppliers,
        ]);

    }


    public function receivables_page(Request $request)
    {
        # code...
        $invoices = Invoice::where('status','0')->get();

        return view('finance.receivables')->with([
            'bills'=> $invoices,
        ]);

    }

    public function statements_page(Request $request)
    {
        # code...
        return view('finance.statements')->with([
            
        ]);
    }


    public function financial_settings_page(Request $request)
    {
        
    }
}
