<ul class="nav nav-pills nav-stacked" style="margin-bottom: 20px">
    <li>
        <a href="{{url('HR/employee/personalinfo') }}/{{$employee->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">Personal Info</span>
        </a>
    </li>
    <li class="">
        <a href="{{url('HR/employee/contacts') }}/{{$employee->id}}" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Contacts</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('HR/employee/education') }}/{{$employee->id}}" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Education</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('HR/employee/accommodation') }}/{{$employee->id}}" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Accommodation</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('HR/employee/physical') }}/{{$employee->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Physical Challenges</span>
        </a>
    </li>

    <li class="">
        <a href="{{url('HR/employee/finances') }}/{{$employee->id}}"  aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Finances</span>
        </a>
    </li>
</ul>