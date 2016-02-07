<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{ \App\SiteConfiguration::getSiteName() }} - 后台管理</title>

    <!-- Fonts -->
    <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ elixir('css/manage.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('scripts.header')
</head>
<body>
    {{-- Nav Bar --}}
    @include('layouts.partials.manage_navbar')
    <div class="container">
        <div class="row">
            {{-- Side Bar --}}
            @include('layouts.partials.manage_sidebar')
            {{-- Content --}}
            <section id="manage-content">
                @yield('content')
            </section>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ elixir('js/manage.js') }}"></script>

    @yield('footer-script')
    <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @stack('scripts')

</body>
</html>