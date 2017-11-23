
<body>
<div class="card-box">
    <div class="table-responsive">
        <h3 class="center">Students</h3>
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
            </tr>

            </thead>


            <tbody>
            @forelse($students as $student)
                            <tr>
                                <td>{{ $batch->Batch_code }}-{{ $student->admission_number }}/{{ $batch->Batch_year }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->middle_names }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>{{ $student->nationality	 }}</td>
                                <td>{{ $student->mobile_number }}</td>
                                <td>{{ $student->email_address }}</td>

                            </tr>
            @empty
                <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>