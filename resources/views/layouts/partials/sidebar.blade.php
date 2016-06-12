<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ route('avatar',['image' => Auth::user()->avatar]) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li {!! isset($pageDetails)?($pageDetails->title == 'dashboard'? 'class="active"' : '') : '' !!}><a href="{{ route('dashboard') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li {!! isset($pageDetails)?($pageDetails->title == 'news'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'news']) }}"><i class='fa fa-newspaper-o'></i> <span>News</span></a></li>
            <li {!! isset($pageDetails)?($pageDetails->title == 'gallery'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'gallery']) }}"><i class='fa fa-file-image-o'></i> <span>Gallery</span></a></li>
            <li class="treeview {!! isset($pageDetails)?(array_search($pageDetails->title,['', 'events', 'result', 'holiday_list', 'academic_calender','rules_and_regulations', 'prospectus'], TRUE)? 'active' : '') : '' !!}">
                <a href="#"><i class='fa fa-table'></i> <span>Academics</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li {!! isset($pageDetails)?($pageDetails->title == 'events'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'events']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'events'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Events</a></li>
                    <li {!! isset($pageDetails)?($pageDetails->title == 'result'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'result']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'result'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Result</a></li>
                    <li {!! isset($pageDetails)?($pageDetails->title == 'holiday_list'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'holiday_list']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'holiday_list'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Holiday List</a></li>
                    <li {!! isset($pageDetails)?($pageDetails->title == 'academic_calender'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'academic_calender']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'academic_calender'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Academic Calender</a></li>
                    <li {!! isset($pageDetails)?($pageDetails->title == 'prospectus'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'prospectus']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'prospectus'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Prospectus</a></li>
                    <li {!! isset($pageDetails)?($pageDetails->title == 'rules_and_regulations'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'rules_and_regulations']) }}"><i {!! isset($pageDetails)?($pageDetails->title == 'rules_and_regulations'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Rules and Regulations</a></li>
                </ul>
            </li>
            <li class="treeview  {!! isset($pageDetails)?(array_search($pageDetails->title,['', 'department', 'course', 'staff', 'student'], TRUE)? 'active' : '') : '' !!}">
                <a href="#"><i class='fa fa-institution'></i> <span>Institute</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li {!! isset($pageDetails)?($pageDetails->title == 'department'? 'class="active"' : '') : '' !!}><a href="{{ route('college::getDepartment') }}"><i {!! isset($pageDetails)?($pageDetails->title == 'department'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Department</a></li>
                  <!--  <li {!! isset($pageDetails)?($pageDetails->title == 'course'? 'class="active"' : '') : '' !!}><a href="{{ route('college::getCourse') }}"><i {!! isset($pageDetails)?($pageDetails->title == 'course'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Course</a></li> -->
                    <li {!! isset($pageDetails)?($pageDetails->title == 'staff'? 'class="active"' : '') : '' !!}><a href="{{ route('college::getStaff') }}"><i {!! isset($pageDetails)?($pageDetails->title == 'staff'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Staff</a></li>
                  <!--  <li {!! isset($pageDetails)?($pageDetails->title == 'student'? 'class="active"' : '') : '' !!}><a href="{{ route('college::getStudent') }}"><i {!! isset($pageDetails)?($pageDetails->title == 'student'? 'class="fa fa-check-square-o"' : 'class="fa fa-square-o"') : 'class="fa fa-square-o"' !!}></i>Student</a></li> -->
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
