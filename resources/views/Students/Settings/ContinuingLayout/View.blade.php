@extends('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="active">
            <a href="{{ url('/dashboard') }}"> Dashboard</a>/
            <a href="{{ url('/pos') }}"> Point Of Sale</a>/
            <a href="{{ url('/pos/suppliers') }}">Supplier</a>
        </li>
    </ol>
@stop
@section('page_title') POS @stop
@section('content')
      <div class="card-box">
        @include('Students.Layouts.nav')
        <div class="row" align="center">
            <h3 style="font-weight: bold; margin-bottom: 40px">Student's Proceed Form Details</h3>
            <br>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-box">
                    <h5> {{$student->first_name}} {{$student->middle_names}}</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    @foreach($batch as $batches)
                        @if($batches->id == $student->batch_id)
                            <h5>{{ $batches->Batch_code }}-{{ $student->admission_number }}/{{ $batches->Batch_year }}</h5>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    @foreach($course as $courses)
                        @if($courses->id == $student->course_id)
                            <h5> {{ $courses->course_name }}</h5>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <div class="card-title" style="font-weight: bold"> Academic Status</div>
                        <h5> {{$student->Academic_Status}}</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box">
                    <div class="card-title" style="font-weight: bold"> Fee Status</div>
                    <h5> {{$student->Fee_Status}}</h5>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-9">
                
            </div>
            <div class="col-md-1">

                @include('Students.Settings.ContinuingLayout.Layout.Fail')

            </div>
            <div class="col-md-1">

                @include('Students.Settings.ContinuingLayout.Layout.Suspend')
            </div>
            <div class="col-md-1">
                <form role="form"   method="POST" action="{{ url('/students/continue/action') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="Academic_Status" value="PROCEED">
                    <input type="hidden" name="q" value="2">
                    <input type="hidden" name="id" value="{{$student->id}}">

                        <button type="submit" class="btn btn-info">Proceed</button>

                </form>
            </div>
        </div>
    </div>

    

@stop