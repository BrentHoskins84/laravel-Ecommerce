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

{{ menu('main', 'partials.nav') }}

@yield('banner')

@yield('content')

<!-- Footer -->
<footer id="footer">
    {{ menu('footer', 'partials.footer') }}

    <div class="copyright">
        &copy; Untitled. All rights reserved.
    </div>
</footer>
<!-- Scripts -->
<script src="/js/skel.min.js""></script>
<script src="{{ mix ('js/app.js') }}"></script>
<script src="/js/jquery.scrollex.min.js""></script>

@yield('extra-js')

</body>
</html>
