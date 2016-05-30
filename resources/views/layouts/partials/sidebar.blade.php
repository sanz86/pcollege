<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
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
            <li {!! isset($pageDetails)?($pageDetails->title == 'dashboard'? 'class="active"' : '') : '' !!}><a href="{{ route('dashboard') }}"><i class='fa fa-link'></i> <span>Dashboard</span></a></li>
            <li {!! isset($pageDetails)?($pageDetails->title == 'news'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'news']) }}"><i class='fa fa-link'></i> <span>News</span></a></li>
            <li {!! isset($pageDetails)?($pageDetails->title == 'gallery'? 'class="active"' : '') : '' !!}><a href="{{ route('content',['content' => 'gallery']) }}"><i class='fa fa-link'></i> <span>Gallery</span></a></li>
            <li class="treeview {!! isset($pageDetails)?(array_search($pageDetails->title,['', 'events', 'result', 'holiday_list', 'academic_calender', 'prospectus'], TRUE)? 'active' : '') : '' !!}">
                <a href="#"><i class='fa fa-link'></i> <span>Academics</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('content',['content' => 'events']) }}">Events</a></li>
                    <li><a href="{{ route('content',['content' => 'result']) }}">Result</a></li>
                    <li><a href="{{ route('content',['content' => 'holiday_list']) }}">Holiday List</a></li>
                    <li><a href="{{ route('content',['content' => 'academic_calender']) }}">Academic Calender</a></li>
                    <li><a href="{{ route('content',['content' => 'prospectus']) }}">Prospectus</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>People</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('department') }}">Department</a></li>
                    <li><a href="{{ route('content',['content' => 'results']) }}">Course</a></li>
                    <li><a href="{{ route('content',['content' => 'holiday_list']) }}">Faculty</a></li>
                    <li><a href="{{ route('content',['content' => 'academic_calender']) }}">Student</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
