<?php
/*
*the following class contains helper functions for the finance module
*/
namespace App\Helpers;

use App\BankAccount;
use App\VoteHead;

class FinanceHelpers
{
    /*
     *update the closing balance for the bank account 
     *this happens after a transaction has occurred
     
    */
    public static function UpdateBankAmount(Array $data)
    {

        $bank = \App\BankAccount::where('id',$data['id']);
        if ($bank->update([
            'ClosingBalance'=>$bank->first()->ClosingBalance + $data['balance'] ,
        ])){
           return json_decode(json_encode([
               'status_code'=>200,
           ]));
        }
        return json_decode(json_encode([
            'status_code'=>500,
        ]));
    }


    /*
     *update the closing balance for the Vote account 
     *this happens after a transaction has occurred
     
    */
    public static function UpdateVoteHeadAmount(Array $data)
    {
        $vote = \App\VoteHead::where('AccountName',$data['account']);
        if ($vote->update([
            'ClosingBalance'=>$vote->first()->ClosingBalance + $data['balance'] ,
        ])) {
           return json_decode(json_encode([
               'status_code'=>200,
           ]));
        }
        return json_decode(json_encode([
            'status_code'=>500,
        ]));

        
    }



    
}


