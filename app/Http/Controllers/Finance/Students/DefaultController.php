<?php

namespace App\Http\Controllers\Finance\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;


class DefaultController extends Controller
{
    //
    public function Home (Request $request)
    {
        # code...
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("fee_payments");
        $items=[];
        foreach ($columns as $key => $value) {
            # code...
            if($value=='id'||$value=='admission_number'||$value=='status'||$value=='created_at'||$value=='updated_at'||$value=='ref_no'||$value=='receipt_no'||$value=='payment_mode'||$value=='bank'||$value=='total'||$value=='arrears')continue;
            $items[]=$value;
        }
        return view('finance.students.home')->with([
            'student'=>[],
            'items' => $items,
            'banks'=>\App\BankAccount::get(),
        ]);
    }

    public function feesetup(Request $request)
    {
        # code...
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("fee_payments");
        $items=[];
        foreach ($columns as $key => $value) {
            # code...
            if($value=='id'||$value=='admission_number'||$value=='status'||$value=='created_at'||$value=='updated_at'||$value=='ref_no'||$value=='receipt_no'||$value=='payment_mode'||$value=='bank'||$value=='total'||$value=='arrears')continue;
            $items[]=$value;
        }

        $batch_fees=\App\BatchFee::get();
        $course_fees=\App\CourseFee::get();
        $courses=\App\Courses::get();
        $batches=\App\Batch::get();

        return view('finance.students.feesetup')->with([
            'items' => $items,
            
            'batch_fees'=>$batch_fees,
            'course_fees'=>$course_fees,
            'courses'=>$courses,
            'batches'=>$batches
  
        ]);
    }

    public function getStudent(Request $request)
    {
        # code...
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("fee_payments");
        $items=[];
        foreach ($columns as $key => $value) {
            # code...
            if($value=='id'||$value=='admission_number'||$value=='status'||$value=='created_at'||$value=='updated_at'||$value=='ref_no'||$value=='receipt_no'||$value=='payment_mode'||$value=='bank'||$value=='total'||$value=='arrears')continue;
            $items[]=$value;
        }
        $student=\App\Students::where('admission_number','=',$request->admission)->first();
        return view('finance.students.home')->with([
            'student'=>$student,
            'items' => $items,
            'payments'=>\App\FeePayment::where('admission_number','=',$request->admission)->get(),
            'banks'=>\App\BankAccount::get(),
        ]);
    }


    public function payFee(Request $request)
    {
        # code...
        $payment=new \App\FeePayment;

        $student_details = \App\Students::where('admission_number','=',$request->admission_number)->first();
       
        $arrears=(int)$student_details->set_fee - (int)$request->amount;
        
        $payment->admission_number=$request->admission_number;
        $payment->payment_mode=$request->payment_mode;
        $payment->receipt_no=$request->receipt_no;
        $payment->ref_no='KTTIIV'.date('YmdHis');
        $payment->bank=$request->bank;
        $payment->total=$request->amount;
        $payment->arrears=$arrears;

        \App\Students::where('admission_number','=',$request->admission_number)->update([
            'set_fee'=>$arrears,
         ]);

        \App\Helpers\FinanceHelpers::UpdateBankAmount([
            'balance'=>$request->amount,
            'id'=>$payment->bank,
        ]);     
 
        $payment->save();
        LaravelSweetAlert::setMessage([
            'title' => 'Success',
            'text' => "Fee Payed",
            'timer' => 2000,
            'type' => 'success',
            'showConfirmButton' =>false
        ]);
        return redirect()->back();  
            
    }


    public function billStudents(Request $request)
    {
        $student_details=[];
        $students = \App\Students::get();
        foreach ($students as $student) {

            $course_fee = \App\CourseFee::where('course_id','=',$student->course_id)->first();
            $batch_fee = \App\BatchFee::where('batch_id','=',$student->batch_id)->first();
            
            if ($batch_fee !='') {
                # code...
                $amount = \App\Batchfee::where('batch_id',$student->batch_id)->first();
                $fee_amount=$amount->amount;

                if ($student->boarding==0) {
                    # code...
                    $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                }

                \App\Students::where('id',$student->id)->update([
                    'set_fee' => $fee_amount + (int)$student->set_fee,
                ]);

                $student_details[]=['reg_no'=>$student->admission_number];
                continue;
            }

            
            if ($course_fee !='') {
                # code...
                $amount = \App\Coursefee::where('course_id',$student->course_id)->first();
                $fee_amount=$amount->amount;

                if ($student->boarding==0) {
                    # code...
                    $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                }

                \App\Students::where('id',$student->id)->update([
                    'set_fee' => $fee_amount + (int)$student->set_fee,
                ]);

                $student_details[]=['reg_no'=>$student->admission_number];

                continue;
            }
        }

        return json_encode([
            'message'=>'success',
            'status_code'=>200,
            'data'=>$student_details
        ]);
    }



    public function revertbillStudents(Request $request)
    {
        $student_details=[];
        $students = \App\Students::get();
        foreach ($students as $student) {

            $course_fee = \App\CourseFee::where('course_id','=',$student->course_id)->first();
            $batch_fee = \App\BatchFee::where('batch_id','=',$student->batch_id)->first();
            
            if ($batch_fee !='') {
                # code...
                $amount = \App\Batchfee::where('batch_id',$student->batch_id)->first();
                $fee_amount=$amount->amount;

                if ($student->boarding==0) {
                    # code...
                    $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                }

                \App\Students::where('id',$student->id)->update([
                    'set_fee' => (int)$student->set_fee - $fee_amount,
                ]);

                continue;
            }

            
            if ($course_fee !='') {
                # code...
                $amount = \App\Coursefee::where('course_id',$student->course_id)->first();
                $fee_amount=$amount->amount;

                if ($student->boarding==0) {
                    # code...
                    $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                }

                \App\Students::where('id',$student->id)->update([
                    'set_fee' =>(int)$student->set_fee - $fee_amount,
                ]);

                continue;
            }
        }

        sleep(10);
        return json_encode([
            'message'=>'success',
            'status_code'=>200,
            'data'=>$student_details
        ]);
    }


    public function billStudentsSimplified(Request $request)
    {
        # code...
        $student_details=[];
        switch ($request->q) {
            case 1:
                $students = \App\Students::where('course_id',$request->course)->get();
                foreach ($students as $student) {

                    $course_fee = \App\CourseFee::where('course_id','=',$student->course_id)->first();
                   
                    
                    if ($course_fee !='') {
                        # code...
                        $amount = \App\Coursefee::where('course_id',$student->course_id)->first();
                        $fee_amount=$amount->amount;

                        if ($student->boarding==0) {
                            # code...
                            $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                        }

                        \App\Students::where('id',$student->id)->update([
                            'set_fee' =>(int)$student->set_fee - $fee_amount,
                        ]);

                        continue;
                    }
                }

                sleep(10);
               
                break;
            case 2:

                $students = \App\Students::where('batch_id',$request->batch)->get();
                foreach ($students as $student) {

                    $batch_fee = \App\BatchFee::where('batch_id','=',$student->batch_id)->first();
                    
                    if ($batch_fee !='') {
                        # code...
                        $amount = \App\Batchfee::where('batch_id',$student->batch_id)->first();
                        $fee_amount=$amount->amount;

                        if ($student->boarding==0) {
                            # code...
                            $fee_amount=(int)$amount->amount - (int)$amount->boarding;
                        }

                        \App\Students::where('id',$student->id)->update([
                            'set_fee' => (int)$student->set_fee - $fee_amount,
                        ]);

                        continue;
                    }

                    
               
                }

                sleep(10);

                break;
            default:
                # code...
                break;
        }

        return json_encode([
            'message'=>'success',
            'status_code'=>200,
            'data'=>$student_details
        ]);
        
    }






}
