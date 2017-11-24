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

        <div class="table-responsive">
            <h3 class="center">Applications</h3>
            <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                <thead>

                <tr>
                    <th>First Name</th>
                    <th>Middle Names</th>
                    <th>Nationality</th>
                    <th>Course Applied For</th>
                    <th>Action</th>
                </tr>

                </thead>


                <tbody>
                @forelse($application as $applies)
                    @if($applies->Status == 1)
                    <tr>
                        <td>{{ $applies->first_name }}</td>
                        <td>{{ $applies->middle_names }}</td>
                        <td>{{ $applies->nationality }}</td>
                        <td>
                        @foreach($course as $courses)
                            @if($courses->id == $applies->course_id)
                                {{ $courses->course_name }}
                            @endif
                        @endforeach
                        </td>
                        <td>
                            <a href="{{url('students/personalinfo/students')}}/{{$applies->id}}" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                        </td>
                    </tr>
                    @endif
                @empty
                    <p>No Data Found</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@stop