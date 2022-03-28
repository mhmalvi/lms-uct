<div class="mdk-drawer__content">
    <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
        <!-- Sidebar Content -->
        <a href="javascript:void(0)" class="sidebar-brand">
            <span>Learnque</span>
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

            {{-- @include('components.teacher-nav-links') --}}

            {{-- Account --}}
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#account_menu">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                    Account
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse sm-indent" id="account_menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('profile.edit') }}">
                            <span class="sidebar-menu-text">Edit Profile</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
