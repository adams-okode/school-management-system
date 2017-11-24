<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementsController extends Controller
{
    //
    public function Home(Request $request)
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


        return view('finance.statements')->with([
            'ledgers'=>$ledgers,
            'accounts'=> $accounts,
            'ledger_totals_credit'=>$ledger_totals_credit,
            'ledger_totals_debit'=>$ledger_totals_debit,
            'tpl_totals_credit'=>$tpl_totals_credit,
            'tpl_totals_debit'=>$tpl_totals_debit


        ]);

    }

    public function reconciliation(Request $request){

        return view('finance.reconciliation')->with([
  
        ]);
    }
}
