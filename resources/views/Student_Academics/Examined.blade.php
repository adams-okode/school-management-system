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
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-2">

                @include('Student_Academics.Layouts.ExamsLayouts.Sidebarnav')
            </div>
            <div class="col-md-10">
                <div class="card-box row">
                    <div class="col-md-12">
                        &nbsp;
                        <h4 class="header-title m-t-0 m-b-30 text-warning">Examined Students</h4>
                        <div class="">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                                        <thead>

                                        <tr>
                                            <th>Admission Number</th>
                                            <th>Course</th>
                                            <th>First Name</th>
                                            <th>Middle Names</th>
                                            <th>Date of Birth</th>
                                            <th>Nationality</th>
                                            <th>Mobile Number</th>
                                            <th>Email Address</th>
                                            <th>Exam Status</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>


                                        <tbody>
                                        @forelse($student as $students)
                                            @foreach($batch as $batches)
                                                @if($batches->id == $students->batch_id)
                                                    @if($batches->Batch_category === 'INITIAL' or $batches->Batch_category === 'ONGOING')
                                                        @if($students->Exam_Status == 1)
                                                        <tr>
                                                            <td>{{ $batches->Batch_code }}-{{ $students->admission_number }}/{{ $batches->Batch_year }}</td>
                                                            @foreach($course as $courses)
                                                                @if($courses->id == $students->course_id)
                                                                    @if($batches->Batch_category === 'INITIAL' or $batches->Batch_category === 'ONGOING')
                                                                        <td>{{ $courses->course_name }}</td>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            <td>{{ $students->first_name }}</td>
                                                            <td>{{ $students->middle_names }}</td>
                                                            <td>{{ $students->dob }}</td>
                                                            <td>{{ $students->nationality	 }}</td>
                                                            <td>{{ $students->mobile_number }}</td>
                                                            <td>{{ $students->email_address }}</td>
                                                            <td>Examined</td>
                                                            <td>
                                                                <a href="{{url('studentacademics/examined/view')}}/{{$students->id}}" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endif
                                                    @endif
                                            @endforeach
                                        @empty
                                            <p>No Data Found</p>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop





