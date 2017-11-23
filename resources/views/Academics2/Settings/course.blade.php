<!-- Add User Modal -->

<!-- End Add User Modal -->

<div class="row" align="left">
    <a class="btn btn-custom" href="{{ url('academics/create/createcourse') }}"><i class="fa fa-fw fa-plus"></i>New Course</a>
    <br>
</div>


<div class="row">
    <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-primary">
        <thead>

        <tr>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Units</th>
            <th>Department Found In</th>
            <th>School Found In</th>
            <th>College Found In</th>
            <th>Campus Situated At</th>
            <th>Action</th>
        </tr>

        </thead>


        <tbody>
        @forelse($course as $courses)
            <tr>
                <td>{{ $courses->course_name }}</td>
                <td>{{ $courses->course_code }}</td>
                <td>
                    @forelse($courses->units as $unit_data)
                        <div class="alert alert-success"  style="padding:3px; border-radius:5%;">
                            {{$unit_data->unit_code}}-{{$unit_data->unit_name}}
                        </div>

                    @empty
                        no units
                    @endforelse
                </td>

                @foreach($depart as $departs)
                    @if($departs->id == $courses->department_id)
                        <td>{{ $departs->department_name }}</td>
                    @endif
                @endforeach

                @foreach($school as $schools)
                    @foreach($depart as $departs)
                        @if($schools->id == $departs->school_id)
                            @if($departs->id == $courses->department_id)
                                <td>{{ $schools->school_name }}</td>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                @foreach($college as $colleges)
                    @foreach($school as $schools)
                        @foreach($depart as $departs)
                            @if($colleges->id == $schools->college_id)
                                @if($schools->id == $departs->school_id)
                                    @if($departs->id == $courses->department_id)
                                        <td>{{ $colleges->name }}</td>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                @foreach($campus as $campuses)
                    @foreach($college as $colleges)
                        @foreach($school as $schools)
                            @foreach($depart as $departs)
                                @if($campuses->id == $colleges->campus_id)
                                    @if($colleges->id == $schools->college_id)
                                        @if($schools->id == $departs->school_id)
                                            @if($departs->id == $courses->department_id)
                                                <td>{{ $campuses->name }}</td>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
                <td>
                    <a href="{{url('academics/delete/course')}}/{{$courses->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete {{$courses->course_name}}')"><i class="fa fa-fw fa-trash"></i></a>
                    <a href="{{url('academics/create/updatecourse')}}/{{$courses->id}}" class="btn btn-primary"><i class=" fa fa-fw fa-pencil "></i></a>
                </td>
            </tr>
            <!-- End Add User Modal -->




        @empty
            <p>No Data Found</p>
        @endforelse
        </tbody>
    </table>
</div>
