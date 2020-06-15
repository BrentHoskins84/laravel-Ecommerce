<!DOCTYPE HTML>
<html>
<head>
    <title>PocketPC | @yield('title', '')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('head')
</head>

<body class="@yield('body-class', '')">

@include('partials.head')

@include('partials.nav')

@yield('banner')

@yield('content')

@include('partials.footer')

</body>
</html>
