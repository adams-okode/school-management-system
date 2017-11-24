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
        <div class="row" align="left">
            <a href="{{ url('HR/employee/register') }}" class="btn btn-custom"><i class="fa fa-fw fa-plus"></i>New Employee</a>
            <br>
        </div>
        <div class="table-responsive">
            <h3 class="center">Employee Creation</h3>
            <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                <thead>

                <tr>
                    <th>First Name</th>
                    <th>Middle Names</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>

                </thead>


                <tbody>
                @forelse($employee as $employees)
                    @foreach($depart as $departs)
                        @if($departs->id == $employees->Department_id)
                            <tr>
                                <td>{{ $employees->First_name }}</td>
                                <td>{{ $employees->Middle_names }}</td>
                                <td>{{ $employees->Last_name }}</td>
                                <td>{{ $employees->Gender }}</td>
                                <td>{{ $employees->Nationality }}</td>
                                <td>
                                    {{ $departs->department_name }}
                                </td>
                                <td>
                                    <a href="{{url('HR/employee/personalinfo')}}/{{$employees->id}}" class="btn btn-custom"><i class=" fa fa-fw fa-pencil "></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @empty
                    <p>No Data Found</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@stop