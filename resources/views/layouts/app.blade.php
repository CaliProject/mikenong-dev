<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ \App\SiteConfiguration::getSiteName() }}</title>

    <meta name="description" content="{{ \App\SiteConfiguration::getSiteDescription() }}">
    <meta name="keywords" content="{{ \App\SiteConfiguration::getSiteKeywords() }}">

    @unless(\App\SiteConfiguration::getSiteLogo() === "")
        <link rel="icon" href="{{ \App\SiteConfiguration::getSiteLogo() }}">
        <link rel="shortcut icon" href="{{ \App\SiteConfiguration::getSiteLogo() }}">
    @endunless
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
    <script>
        $(function () {
            $('#back-to-top').hide();

            $('#search-bar').bind('keypress',function(event){
                if(event.keyCode == "13" && $.trim($('#search-bar').val()) != "")
                {
                    window.location.href = "{{ url('/search')}}/" + $('#search-bar').val();
                }
            });

            $('#search-btn').on('click', function () {
                if ($.trim($('#search-bar').val()) != "") {
                    window.location.href = "{{ url('/search')}}/" + $('#search-bar').val();
                }
            });

            $('#back-to-top').on('click', function () {
                $('body').animate({
                    scrollTop: 0
                }, 500);
            });

            $('#features').on('click', function () {
                window.open('{{ url('about') }}', "_blank");
            });

            $(window).scroll(function () {
                if ($(this).scrollTop() >= 350) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
        });
    </script>
    @yield('footer-script')
    <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @stack('scripts')

</body>
</html>
