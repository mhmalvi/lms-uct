<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
        <span class="sidebar-menu-text">Dashboard</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#post_menu">
        <i class="bi bi-chat-left-text sidebar-menu-icon sidebar-menu-icon--left"></i>
        Posts
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="post_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.posts.index')}}">
                <span class="sidebar-menu-text">All Posts</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{route('admin.posts.create')}}">
                <span class="sidebar-menu-text">Add New</span>
            </a>
        </li>
    </ul>
</li>

<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#student_menu">
        <i class="bi bi-people sidebar-menu-icon sidebar-menu-icon--left"></i>
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
        <i class="bi bi-newspaper sidebar-menu-icon sidebar-menu-icon--left"></i>
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
