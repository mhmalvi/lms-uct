<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="api-base-url" content="{{ URL::to('/') }}" />
        <title>Login - Learnque Admin</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        @include('layouts.styles')

        <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>

    <body class="layout-default layout-login-centered-boxed justify-content-center align-items-center">
        <div class="preloader bg-light"></div>
        <div class="layout-login-centered-boxed__form card" id="app">
            <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
                <a href=""
                   class="navbar-brand flex-column mb-2 align-items-center mr-0 font-bold"
                   style="min-width: 0">

                    <span class="avatar avatar-sm navbar-brand-icon mr-0">
                        <span class="avatar-title rounded bg-light">
                            <img src="{{asset('assets/images/logo/black-70@2x.png')}}" alt="logo" class="img-fluid" />
                        </span>
                    </span>

                    Learnque
                </a>
                <p class="m-0 semibold">Login to access your Account </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <admin-login></admin-login>

            {{-- <form action="{{route('admin.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-label font-semibold" for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2"
                               type="email"
                               name="email"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="john@doe.com">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label font-semibold"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2"
                               type="password"
                               name="password"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="Enter your password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
            </form> --}}
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @include('layouts.scripts')
    </body>

</html>