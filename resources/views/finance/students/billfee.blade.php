<div class="row">
    <div class="col-md-3">
        <button class="btn btn-success" onclick="bill();">Bill All Students</button>
    </div>
    <div class="col-md-3">
       
    </div>
    <div class="col-md-3">
       
    </div>
</div>
<br>
<legend></legend>
<h5>Bill Per Batch</h5>
<legend></legend>
<div class="row">
    <div class="col-md-4"> 
            <div class="form-group">
            <select class="selectpicker" data-live-search="true" required  id="batch_to_bill" title="Batch" name="batch">
                @foreach($batches as $batch)
                <option value="{{$batch->id}}">{{$batch->Batch_name}}</option> 
                @endforeach
            </select>
            </div>
        
    </div>
    <div class="col-md-3">
       <button class="btn btn-primary" onclick="bill(2);">Bill</button>
    </div>
    <div class="col-md-3">
       
    </div>
</div>
<legend></legend>
<h5>Bill Per Course</h5>
<legend></legend>
<div class="row">
    <div class="col-md-4"> 
            <div class="form-group">
            <select class="selectpicker" data-live-search="true" required  id="course_to_bill" title="Course" name="batch">
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->course_name}}</option> 
                @endforeach
            </select>
            </div>
        
    </div>
    <div class="col-md-3">
       <button class="btn btn-primary" onclick="bill(1);">Bill</button>
    </div>
    <div class="col-md-3">
       
    </div>
</div>
<legend></legend>


<div id="loading-wrapper">
        <div id="loading-text">SETTING</div>
        <div id="loading-content"></div>
</div>

<div id="progress_data">
   
</div>
<div class="row">
<div class="">
     
</div>

    
</div>


@section('scripts')

    @include('finance.students.scripts.bill')

@stop