<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AGNA Distribution')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <a href="{{ url('/orders') }}">AGNA Distribution</a>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
