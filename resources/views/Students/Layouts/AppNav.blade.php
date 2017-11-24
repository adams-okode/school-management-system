<ul class="nav nav-pills nav-stacked" style="margin-bottom: 20px">
     <li>
        <a href="{{url('students/personalinfo/students') }}/{{$application->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">Personal Info</span>
        </a>
    </li>
    <li class="">
        <a href="{{url('students/contacts/students') }}/{{$application->id}}" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Contacts</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('students/education/students') }}/{{$application->id}}" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Education Background</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('students/parent/students') }}/{{$application->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Parent/Sponsor</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('students/physical/students') }}/{{$application->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Physical Challenges</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('students/finances/students') }}/{{$application->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Finances</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('students/process/students') }}/{{$application->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Process</span>
        </a>
    </li>
</ul>