<!DOCTYPE html>
<html>
    @include('components.head')
    <body>
        @include ('components.nav')
        @yield('content')
        @include('components.footer')
        @include('components.scripts')
        @yield('appendScripts')
    </body>
</html>