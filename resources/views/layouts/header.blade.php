<div class="navbar navbar-expand pr-0 navbar-light border-bottom-2" id="default-navbar" data-primary>
    <!-- Navbar Toggler -->
    <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
        <span class="material-icons">short_text</span>
    </button>
    <!-- // END Navbar Toggler -->

    <!-- Navbar Brand -->
    <a href="{{route('learnque')}}" class="navbar-brand mr-16pt d-lg-none">
        <span class="d-none d-lg-block">Quadque - LMS</span>
    </a>
    <!-- // END Navbar Brand -->

    <div class="flex"></div>

    <!-- Navbar Menu -->
    <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">
        <div class="nav-item dropdown">
            <a href="#" class="navbar-brand mr-16pt dropdown-toggle" data-toggle="dropdown" data-caret="false">
                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                    <avatar-header-component avatar_url="{{ auth()->user()->avatar_url }}" />
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right mr-3 mr-lg-4">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    Edit Profile
                </a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout').submit()">
                    Logout
                </a>

                <form action="{{route('logout')}}" method="POST" id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- // END Navbar Menu -->
</div>
