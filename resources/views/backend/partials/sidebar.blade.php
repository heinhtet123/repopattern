<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user_name }}</p>
                <a href="{{ url('backend') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li @if (Request::is('backend')) class="active" @endif class="treeview">
                <a href="{{ url('backend') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                </a>
            </li>

            <li @if (Request::is('backend/student*')) class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Students</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/student')) class="active" @endif><a href="{{ url('backend/student') }}"><i class="fa fa-circle-o"></i> All Students</a></li>
                    <li @if (Request::is('backend/student/create')) class="active" @endif><a href="{{ url('backend/student/create') }}"><i class="fa fa-circle-o"></i> Create Student</a></li>
                </ul>
            </li>


            <li @if (Request::is('backend/blog*')) class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Blogs</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/blog')) class="active" @endif><a href="{{ url('backend/blog') }}"><i class="fa fa-circle-o"></i> All Blogs</a></li>
                    <li @if (Request::is('backend/blog/create')) class="active" @endif><a href="{{ url('backend/blog/create') }}"><i class="fa fa-circle-o"></i> Create Blog</a></li>
                </ul>
            </li>

             <li @if (Request::is('backend/group*')) class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Groups</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('basckend/group')) class="active" @endif><a href="{{ url('backend/group') }}"><i class="fa fa-circle-o"></i> All Groups</a></li>
                    <li @if (Request::is('backend/group/create')) class="active" @endif><a href="{{ url('backend/group/create') }}"><i class="fa fa-circle-o"></i> Create Group</a></li>
                </ul>
            </li>




            <?php  if($user_role===1): ?>
                
                {{-- role --}}
            <li @if (Request::is('backend/roles*')) class="active" @endif class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Role</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/roles')) class="active" @endif><a href="{{ url('backend/roles') }}"><i class="fa fa-circle-o"></i> All Role</a></li>
                    <li @if (Request::is('backend/roles/create')) class="active" @endif><a href="{{ url('backend/roles/create') }}"><i class="fa fa-circle-o"></i> Create Role</a></li>
                </ul>
            </li>


            {{-- course --}}
            <li @if (Request::is('backend/course*')) class="active" @endif class="treeview" >
                <a href="#">
                    <i class="fa fa-users"></i> <span>Courses</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/course')) class="active" @endif><a href="{{ url('backend/course') }}"><i class="fa fa-circle-o"></i> All Courses</a></li>
                    <li @if (Request::is('backend/course/create')) class="active" @endif><a href="{{ url('backend/course/create') }}"><i class="fa fa-circle-o"></i> Create Course</a></li>
                </ul>
            </li>


            {{-- batch --}}
            @if(Session::has('course_id'))
            
            <li @if (Request::is('backend/batch*')) class="active" @endif class="treeview" >
                <a href="#">
                    <i class="fa fa-users"></i> <span>Batch</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li @if (Request::is('backend/batch')) class="active" @endif><a href="{{ url('backend/batch/#/batches') }}"><i class="fa fa-circle-o"></i> All Batches</a></li>

                    <li @if (Request::is('backend/batch/create')) class="active" @endif><a href="{{ url('backend/batch/create') }}"><i class="fa fa-circle-o"></i> Create Batch</a></li>
                </ul>
            </li>
             {{--   {{ Session::get('course_id') }} --}}
            @endif
            <!-- including session or not check! -->

             <li @if (Request::is('backend/enrolledstudent*')) class="active" @endif class="treeview" >
                <a href="#">
                    <i class="fa fa-users"></i> <span>EnrolledStudents</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/enrolledstudent')) class="active" @endif><a href="{{ url('backend/enrolledstudent') }}"><i class="fa fa-circle-o"></i> All EnrolledStudents</a></li>
                    <li @if (Request::is('backend/enrolledstudent/create')) class="active" @endif><a href="{{ url('backend/enrolledstudent/create') }}"><i class="fa fa-circle-o"></i> Create EnrolledStudents</a></li>
                </ul>
            </li>

            <li @if (Request::is('backend/attendence*')) class="active" @endif class="treeview" >
                <a href="#">
                    <i class="fa fa-users"></i> <span>Attendence</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/attendence')) class="active" @endif><a href="{{ url('backend/attendence') }}"><i class="fa fa-circle-o"></i> All Attendences</a></li>
                    <li @if (Request::is('backend/attendence/create')) class="active" @endif><a href="{{ url('backend/enrolledstudent/attendence') }}"><i class="fa fa-circle-o"></i> Create Attendence</a></li>
                </ul>
            </li>


            <?php endif; ?>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>