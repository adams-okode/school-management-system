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
            <a href="{{ url('HR/employee/category') }}" class="btn btn-custom"><i class="fa fa-fw fa-plus"></i>New Employee Category</a>
            <a href="{{ url('HR/allemployees') }}" class="btn btn-custom"><i class="fa fa-fw fa-plus"></i>All Employees</a>
        </div>
        <div class="table-responsive">
            <h3 class="center">Employees</h3>
            <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
                <thead>

                <tr>
                    <th>Department</th>
                    <th>Units</th>
                    <th>Employee Category</th>
                    <th>First Name</th>
                    <th>Middle Names</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>

                </thead>


                <tbody>
                @forelse($employee as $employees)
                    <tr>
                        @foreach($depart as $departs)
                            @if($departs->id == $employees->Department_id)
                                <td>{{ $departs->department_name }}</td>
                            @endif
                        @endforeach
                            <td>
                        @foreach($unit as $units)
                            @forelse($units->units as $unit_data)
                                {{$unit_data->unit_code}}-{{$unit_data->unit_name}}
                            @empty
                                no units
                            @endforelse
                        @endforeach
                            </td>

                        @foreach($category as $categories)
                            @if($categories->id == $employees->Category)
                                <td>{{ $categories->Name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $employees->First_name }}</td>
                        <td>{{ $employees->Middle_names }}</td>
                        <td>{{ $employees->Last_name }}</td>
                        <td>{{ $employees->Gender}}</td>
                        <td>{{ $employees->Nationality	 }}</td>
                        <td>{{ $employees->Mobile_number }}</td>
                        <td>{{ $employees->Email_address }}</td>
                        <td>
                            <a href="{{url('HR/employee/delete')}}/{{$employees->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete {{$employees->First_name}} {{$employees->Middle_names}} {{$employees->Last_name}}?')"><i class="fa fa-fw fa-trash"></i></a>

                        </td>
                    </tr>
                @empty
                    <p>No Data Found</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@stop