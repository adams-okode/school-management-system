

<div class="nav tabs-vertical">
    <div>
        <h4>Exams</h4>
    </div>
    @foreach($exam as $exams)
        @foreach($academic as $academics)
            @if($academics->id == $exams->Academic_year)
                {{$academics->Name}}
                <form role="form"   method="POST" action="{{ url('studentacademics/examined/check') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="student" value="{{$student->id}}">
                    <input type="hidden" name="id" value="{{ $exams->id}}">

                    <button type="submit" class="btn btn-info">{{$exams->Name}}</button>

                </form>
            @endif
        @endforeach
    @endforeach
</div>

