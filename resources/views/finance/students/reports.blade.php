

<h5>Get Arrears Per Batch</h5>
<legend></legend>
<div class="row">
    <form>
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
            <button type="submit" class="btn btn-primary">Bill</button>
        </div>
        <div class="col-md-3">
        
        </div>
    </form>
</div>
<legend></legend>
<h5>Get Arrears Per Course</h5>
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

    

@stop