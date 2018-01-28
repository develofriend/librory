<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.fragments.head')
    @yield('head-addon')

</head>
<body class="@yield('body-class') auth-body @if (auth()->check()) auth-body @endif">

    @include('layouts.fragments.nav')

    <div id="content">
        @yield('content')
    </div>

    @include('layouts.fragments.scripts')
    @yield('footer-addon')

</body>
</html>
