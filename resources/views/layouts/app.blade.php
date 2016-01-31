<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or '' }} - 米科农网</title>

    <!-- Fonts -->
    <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('scripts.header')

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">

    @include('layouts.partials.app_navbar')

    @yield('content')

    @include('layouts.partials.app_footer')

    <!-- JavaScripts -->
    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('footer-script')
    <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @stack('scripts')

</body>
</html>
