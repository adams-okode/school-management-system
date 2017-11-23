
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
                @forelse($student as $students)
                    @foreach($batch as $batches)
                        @if($batches->id == $students->batch_id)
                            @if($batches->Batch_category === 'INITIAL' or $batches->Batch_category === 'ONGOING')
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
                                </tr>
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

</body>