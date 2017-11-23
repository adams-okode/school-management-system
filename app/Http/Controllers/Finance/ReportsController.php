<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    //
    public function generalLedger(Request $request)
    {
        # code...
        $ledgers = \App\Ledger::get();
        $accounts = \App\VoteHead::get();
        $ledger_totals_credit= [];
        $ledger_totals_debit= [];

       

        foreach ($ledgers as $ledger) {
            # code...
            $data=[];
            $data_2=[];
            foreach ($accounts as $account) {
                if ($account->ledger_id != $ledger->id) continue;
                if ($account->Type==1) { $data[]=$account->ClosingBalance; }
                if ($account->Type==2) { $data_2[]=$account->ClosingBalance; }
            }

            $ledger_totals_credit[$ledger->id]=array_sum($data);
            $ledger_totals_debit[$ledger->id]=array_sum($data_2);
        }


        foreach ($accounts as $account) {
            # code...
            $data=[];
            $data_2=[];
          
            if ($account->Type==1) { $data[]=$account->ClosingBalance; }
            if ($account->Type==2) { $data_2[]=$account->ClosingBalance; }

           
        }
        $tpl_totals_credit=array_sum($data);
        $tpl_totals_debit=array_sum($data_2);
        $pdf = \PDF::loadView('finance.reports.general_ledger',[

            'ledgers'=>$ledgers,
            'accounts'=> $accounts,
            'ledger_totals_credit'=>$ledger_totals_credit,
            'ledger_totals_debit'=>$ledger_totals_debit,
            'tpl_totals_credit'=>$tpl_totals_credit,
            'tpl_totals_debit'=>$tpl_totals_debit

        ]);
        return $pdf->download('ledger.pdf');
    }


    public function tpStatement(Request $request)
    {
        # code...
        $ledgers = \App\Ledger::get();
        $accounts = \App\VoteHead::get();
        $ledger_totals_credit= [];
        $ledger_totals_debit= [];

       

        foreach ($ledgers as $ledger) {
            # code...
            $data=[];
            $data_2=[];
            foreach ($accounts as $account) {
                if ($account->ledger_id != $ledger->id) continue;
                if ($account->Type==1) { $data[]=$account->ClosingBalance; }
                if ($account->Type==2) { $data_2[]=$account->ClosingBalance; }
            }

            $ledger_totals_credit[$ledger->id]=array_sum($data);
            $ledger_totals_debit[$ledger->id]=array_sum($data_2);
        }


        foreach ($accounts as $account) {
            # code...
            $data=[];
            $data_2=[];
          
            if ($account->Type==1) { $data[]=$account->ClosingBalance; }
            if ($account->Type==2) { $data_2[]=$account->ClosingBalance; }

           
        }
        $tpl_totals_credit=array_sum($data);
        $tpl_totals_debit=array_sum($data_2);
        $pdf = \PDF::loadView('finance.reports.tpl',[

            'ledgers'=>$ledgers,
            'accounts'=> $accounts,
          
            'tpl_totals_credit'=>$tpl_totals_credit,
            'tpl_totals_debit'=>$tpl_totals_debit
            
        ]);
        return $pdf->download('tpstatement.pdf');
    }



    public function FeeReceipt(Request $request)
    {
        # code...
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("fee_payments");
        $id=$request->id;
        $items=[];
        foreach ($columns as $key => $value) {
            # code...
            if($value=='id'||$value=='admission_number'||$value=='status'||$value=='created_at'||$value=='updated_at'||$value=='ref_no'||$value=='receipt_no'||$value=='payment_mode'||$value=='bank'||$value=='total'||$value=='arrears')continue;
            $items[]=$value;
        }
        $payment=\App\FeePayment::where('id',$id)->first();
        $student=\App\Students::where('admission_number',$payment->admission_number)->first();
        $pdf = \PDF::loadView('finance.reports.feereceipt',[
            'payment'=>$payment,
            'items'=> $items,    
            'student'=>$student   
        ]);

        /*
        return view('finance.reports.feereceipt')->with([
            'payment'=>$payment,
            'items'=> $items,    
            'student'=>$student  
        ]);*/

        
        return $pdf->download($payment->admission_number.'feestatement.pdf');
    }
}
