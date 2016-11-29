<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::secure('src/css/main.css') }}" type="text/css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        @yield('styles')
    </head>
    <body>
        @include('includes.header')
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>