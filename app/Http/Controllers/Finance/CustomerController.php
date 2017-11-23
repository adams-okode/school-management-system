<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Invoice;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class CustomerController extends Controller
{
    //
    public function Bill(Request $request)
    {
        # code...
        $customer = Customer::where('id',$request->input('id'))->first();
        $bills = Invoice::where('customer_id',$request->input('id'))->get();

        return view('finance.bill')->with([
                'customer'=>$customer,
                'bills'=>$bills
            ]);

    }


    public function generate_bill(Request $request)
    {
        # code...
        $data=[];
        $amount=[];        
        $inputs = $request->all();

        for ($i=1; $i <= $request->total; $i++) { 
            # code...
            $data[]=$inputs['no_of_items_'.$i].'-'.$inputs['items_'.$i];
            $amount[]=$inputs['Amount_'.$i];
        }

        $amount=array_sum($amount);
        $string_version = implode(',', $data);
        $bill = new Invoice;
        
        $bill->invoice_no = $request->invoice_no;
        $bill->customer_id = $request->customer_id;
        $bill->Amount = $amount;
        $bill->items = $string_version;
        $bill->type='CUSTOMER';
        $bill->status = 0;

        if ($bill->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=>'customer record deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'error deleting customer record',
            ]);
        }

    }

    public function receivables_pay(Request $request)
    {
        # code...
        $bill = Invoice::where('id',$request->input('id'))->first();
        $customer = Customer::where('id',$bill->customer_id)->first();
        $payments = \App\Payments::where('invoice_id',$request->input('id'))->get();

        return view('finance.paybill')->with([
                'bill'=>$bill,
                'customer'=>$customer,
                'payments'=>$payments
            ]);


    }


    public function pay_invoice(Request $request)
    {
        # code...
        $invoice = \App\Invoice::where('id',$request->input('id'))->first();
        $payment = new \App\Payments;

        if ($request->Amount == $invoice->Amount) {
            # code...
            $payment->payer_id=$invoice->customer_id;
            $payment->type='CUSTOMER';
            $payment->amount=$request->Amount;
            $payment->invoice_id=$request->id;
            $payment->balance=0;

            $payment->save();

             # code...
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Payment Made",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);

            \App\Helpers\FinanceHelpers::UpdateVoteHeadAmount([
                'balance'=>$request->Amount,
                'account'=>'shop',
            ]);     

            return redirect()->back();

        }

    
        $payment->payer_id=$invoice->customer_id;
        $payment->type='CUSTOMER';
        $payment->amount=$request->Amount;
        $payment->invoice_id=$request->id;
        $payment->balance=$invoice->Amount-$request->Amount;

        $payment->save();

        \App\Helpers\FinanceHelpers::UpdateVoteHeadAmount([
            'balance'=>$request->Amount,
            'account'=>'shop',
        ]); 
             # code...
        LaravelSweetAlert::setMessage([
            'title' => 'Success',
            'text' => "Payment Made",
            'timer' => 2000,
            'type' => 'success',
            'showConfirmButton' =>false
        ]);

        return redirect()->back();    




    }




}
