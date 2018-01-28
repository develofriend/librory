<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.fragments.head')
    @yield('head-addon')

</head>
<body>

    @include('layouts.fragments.nav')

    <div id="content">
        @yield('content')
    </div>

    @include('layouts.fragments.scripts')
    @yield('footer-addon')

</body>
</html>
