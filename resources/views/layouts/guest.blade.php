<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="api-base-url" content="{{ URL::to('/') }}" />

        <title>Home</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

              @include('layouts.styles')
    </head>

    <body class="layout-default layout-login-centered-boxed">
        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>


        <div class="layout-login-centered-boxed__form card p-4" id="app">
            @yield('content')
        </div>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @include('layouts.scripts')
    </body>

</html>
