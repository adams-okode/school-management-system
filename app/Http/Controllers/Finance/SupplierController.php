<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class SupplierController extends Controller
{
    //
    public function Bill(Request $request)
    {
        # code...
        $customer = \App\Supplier::where('id',$request->input('id'))->first();
        $bills = \App\Invoice::where('customer_id',$request->input('id'))->get();

        return view('finance.bill_supplier')->with([
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
        $bill = new \App\Invoice;
        
        $bill->invoice_no = $request->invoice_no;
        $bill->customer_id = $request->customer_id;
        $bill->Amount = $amount;
        $bill->type='SUPPLIER';
        $bill->items = $string_version;
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
       
        $bill = \App\Invoice::where('id',$request->input('id'))->first();
        $customer = \App\Supplier::where('id',$bill->customer_id)->first();
        $payments = \App\Payments::where('invoice_id',$request->input('id'))->get();
        
        return view('finance.payment_voucher')->with([
                'bill'=>$bill,
                'customer'=>$customer,
                'payments'=>$payments
            ]);


    }

    public function receivables_pay_all(Request $request)
    {
        # code...
       
        $bills = \App\Invoice::where('type','SUPPLIER')->get();
        
        return view('finance.payment_voucher')->with([
                'bills'=>$bills,
             
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
            $payment->type='SUPPLIER';
            $payment->amount=$request->Amount;
            $payment->invoice_id=$request->id;
            $payment->balance=0;

            $payment->save();

             # code...
            \App\Invoice::where('id',$request->input('id'))->update([
                'status'=>1,
            ]);
            LaravelSweetAlert::setMessage([
                        'title' => 'Success',
                        'text' => "Payment Made",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);

            \App\Helpers\FinanceHelpers::UpdateVoteHeadAmount([
                'balance'=>$request->Amount,
                'account'=>'payables',
            ]);     

            return redirect()->back();

        }

    
        $payment->payer_id=$invoice->customer_id;
        $payment->type='SUPPLIER';
        $payment->amount=$request->Amount;
        $payment->invoice_id=$request->id;
        $payment->balance=$invoice->Amount-$request->Amount;

        $payment->save();

        \App\Helpers\FinanceHelpers::UpdateVoteHeadAmount([
            'balance'=>$request->Amount,
            'account'=>'payables',
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
