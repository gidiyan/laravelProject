<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Blog Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ config('app.name','Blog template') }} | @yield('title')</title>
@yield('meta')
<!-- Stylesheets -->
    @yield('styles')
</head>
<body>
<!-- body-->
@yield('body')
<!-- scripts-->
</body>
</html>

