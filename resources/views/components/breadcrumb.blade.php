<div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left px-5">
    <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
            <h2 class="mb-0">
                @yield('title')
                @yield('link')
            </h2>
        </div>
    </div>

    <div class="row" role="tablist">
        <div class="col-auto">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item">
                    @php
                        if(auth('admin')->check())
                        {
                            $home = route('admin.dashboard');
                        }
                        else
                        {
                            $home = route('dashboard');
                        }
                    @endphp
                    <a href="{{ $home }}">Home</a>
                </li>
                @if (request()->segment(1))
                    <li class="breadcrumb-item">
                        {{Str::upper(request()->segment(1))}}
                    </li>
                @endif
                @if (request()->segment(2))
                    <li class="breadcrumb-item">
                        {{Str::upper(request()->segment(2))}}
                    </li>
                @endif
                @if (request()->segment(3))
                    <li class="breadcrumb-item">
                        {{Str::upper(request()->segment(3))}}
                    </li>
                @endif
            </ol>
        </div>
    </div>
</div>
