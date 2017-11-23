<div class="row">

    <form method="POST" action="{{ url('finance/students/coursefee') }}">
    {{ csrf_field() }}
    <div class="col-md-4">
        <div class="form-group">
            <select class="selectpicker" data-live-search="true" required name="course_id" title="Select Course">
            @foreach($courses as $course)
                    <option data-tokens="{{ $course->course_name}}" value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
                
            </select>
        </div>
    </div>    

        @foreach($items as $key=> $value)
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" name="{{$value}}" class="form-control" placeholder="{{$value}}">
                </div>      
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary"> Save</button>
    </form>
    
</div>

<div class="row">
<div class="">
        <table id="datatable" class="table table-striped table-condensed table-bordered table-colored table-custom">
            <thead>

            <tr>
                <th>Course</th>
                @foreach($items as $key=> $value)
                <th>{{$value}}</th>
                @endforeach
                
                <th>Amount</th>
                
            </tr>

            </thead>


            <tbody>
            @forelse($course_fees as $fee)
            <tr>
                <td>{{$fee->course->course_name}}</td>
                @foreach($items as $key=> $value)
                 <td>{{$fee->$value}}</td>
                @endforeach
                <td>{{$fee->amount}}</td>
                
            
            </tr>
            @empty
                    <p>No Data Found</p>
            @endforelse
            </tbody>
        </table>
</div>

    
</div>