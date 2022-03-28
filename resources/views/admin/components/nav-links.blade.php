<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
        <span class="sidebar-menu-text">Dashboard</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{route('admin.classrooms')}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">class</span>
        <span class="sidebar-menu-text">Classrooms</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{route('admin.liveclass.index')}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">video_call</span>
        <span class="sidebar-menu-text">Live Class</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#course_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">library_books</span>
        Course
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="course_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.categories.index') }}">
                <span class="sidebar-menu-text">Manage Categories</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.courses.index') }}">
                <span class="sidebar-menu-text">Manage Courses</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#student_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
        Users
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="student_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.enroll_users.index') }}">
                <span class="sidebar-menu-text">Enroll Users</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.students.index') }}">
                <span class="sidebar-menu-text">Manage Students</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.teachers.index') }}">
                <span class="sidebar-menu-text">Manage Instructors</span>
            </a>
        </li>
    </ul>
</li>

<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#news_notice_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">question_answer</span>
        News & Notice
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="news_notice_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.news_and_notices.create') }}">
                <span class="sidebar-menu-text">Add New</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.news_and_notices.index') }}">
                <span class="sidebar-menu-text">Manage All</span>
            </a>
        </li>
    </ul>
</li>
