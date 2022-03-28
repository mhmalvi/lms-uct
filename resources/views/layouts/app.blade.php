<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ URL::to('/') }}" />

    <title>{{ config('app.name', 'LearnQue') }} - @yield('title')</title>

    @include('layouts.styles')
</head>

<body>
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

    <!-- Drawer Layout -->
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content" id="app">

            @include('layouts.header')

            @include('components.breadcrumb')

            <div class="container page__container">
                @yield('content')
            </div>

        </div>

        <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
            @include('layouts.sidebar')
        </div>

    </div>

    <!-- Scripts -->
    @include('layouts.scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
