@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb hide-phone p-0 m-0">
    <li class="active">
    	<a href="{{ url('/dashboard') }}"> Dashboard</a>/
        <a href="{{ url('/finance') }}"> Finance</a>
    </li>
</ol>
@stop
@section('page_title') Finance @stop
@section('content')
 
<div class="col-md-2">
    @include('finance.layout.nav')
</div>
<div class="col-md-10">
    <div class="card-box">
       
        <div class="row">
           <form action="{{ url('finance/students/get/student') }}" method="GET">
           
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="admission" id="usr">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2">
                
            </div>

            </form>
            <div class="col-md-2">
                <a href="{{ url('finance/students/fee/setup') }}">
                  <button  class="btn btn-primary">Fee Set Up</button>
                </a>
            </div>
        </div>
        <legend></legend>
        <div class="row">
            <div class="col-md-3">
                <h6>{{ @$student->first_name }} {{ @$student->middle_names }}</h6>

            </div>

            <div class="col-md-3">
                <h6>{{ @$student->admission_number }}</h6>

            </div>
            <div class="col-md-3">
               @if(@$student)
                @if(@$student->set_fee >0)
                    <button type="" class="btn btn-danger">{{ @$student->set_fee }}</button>
                 
                @else
                    <button type="" class="btn btn-success">{{ @$student->set_fee }}</button>
                @endif
               @endif
               <br>

            </div>
            
        </div>
        <br>
        <br>
      

        <form action="{{ url('finance/students/payfee') }}" method="POST">
            <div class="row">
            {{ csrf_field() }}
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="receipt_no" placeholder="Receipt/Ref/Cheque No.." id="usr">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <select class="selectpicker" data-live-search="true" required id="sel1" title="Mode Of Payment..." name="payment_mode">
                        <option>Cash</option>
                        <option>Cheque</option>
                        <option>PaySlip</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="number" class="form-control"  id="usr" placeholder="Amount.." name="amount">
                    </div>
                </div>
                <input type="hidden" name="admission_number" value="{{ @$student->admission_number }}">
                <div class="col-md-4">
                    <div class="form-group">
                    <select class="selectpicker" data-live-search="true" required  id="sel1" title="Bank" name="bank">
                       @foreach($banks as $bank)
                        <option value="{{$bank->id}}">{{$bank->AccountName}} {{$bank->AccountNumber}}</option>
                       
                       @endforeach
                    </select>
                    </div>
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary">Pay</button>

            </div>
        </form>
          <legend></legend>
        
        <div class="row">

            <div class="">
                <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                    <thead>

                    <tr>
                        <th>Receipt Number</th>
                        @foreach($items as $key=> $value)
                        <th>{{$value}}</th>
                        @endforeach
                        <th>Amount</th>
                        <th>Payed On</th>
                        <th>Action</th>
                    </tr>

                    </thead>


                    <tbody>
                    @if($student != [])
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{$payment->ref_no}}</td>
                                @foreach($items as $key=> $value)
                                <td>{{$payment->$value}}</td>
                                @endforeach
                                <td>{{$payment->total}}</td>
                                <td>{{$payment->created_at}}</td>
                                <td>
                                    <a href="{{url('finance/students/print/receipt')}}?id={{$payment->id}}">
                                        <i class="fa fa-print">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p>no payments made</p>
                        @endforelse    
                    
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
                         
    </div>
</div>                      

@stop