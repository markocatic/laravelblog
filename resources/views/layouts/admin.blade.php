<!DOCTYPE html>
<html>
@include('components.head')
<body>
@include ('admin.nav')
@yield('content')
@include('components.footer')
@include('components.scripts')
@yield('appendScripts')
</body>
</html>