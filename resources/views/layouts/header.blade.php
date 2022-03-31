<div class="navbar navbar-expand pr-0 navbar-light border-bottom-2" id="default-navbar" data-primary>
    <!-- Navbar Toggler -->
    <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
        <i class="bi bi-layout-text-sidebar-reverse"></i>
    </button>
    <!-- // END Navbar Toggler -->

    <!-- Navbar Brand -->
    <a href="{{route('learnque')}}" class="navbar-brand mr-16pt d-lg-none">
        <span class="d-none d-lg-block">Quadque - LMS</span>
    </a>
    <!-- // END Navbar Brand -->

    <form action="{{route('logout')}}" method="POST" id="logout">
        @csrf
    </form>
</div>
