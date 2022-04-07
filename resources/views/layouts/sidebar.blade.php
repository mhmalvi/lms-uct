<div class="mdk-drawer__content">
    <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
        <!-- Sidebar Content -->
        <a href="javascript:void(0)" class="sidebar-brand">
            <span>UCT LMS</span>
        </a>

        <div class="sidebar-heading">User Type</div>
        <ul class="sidebar-menu">
            @if(auth()->user()->user_type == 'student')
                @include('components.student-nav-links')
            @elseif(auth()->user()->user_type == 'teacher')
                @include('components.teacher-nav-links')
            @elseif(auth('admin')->check())
                @include('admin.components.nav-links')
            @endif

            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-circle sidebar-menu-icon sidebar-menu-icon--left"></i>
                    <span class="sidebar-menu-text">My Profile</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout').submit()">
                    <i class="bi bi-box-arrow-right sidebar-menu-icon sidebar-menu-icon--left"></i>
                    <span class="sidebar-menu-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
