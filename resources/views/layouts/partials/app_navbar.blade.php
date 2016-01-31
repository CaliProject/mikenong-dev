<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                米科农网
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">菜单1</a></li>
                <li><a href="{{ url('/home') }}">菜单2</a></li>
                <li><a href="{{ url('/home') }}">菜单3</a></li>
                <li><a href="{{ url('/home') }}">菜单4</a></li>
                <li><a href="{{ url('/home') }}">菜单5</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <input type="search" id="search-bar" class="search-bar" maxlength="50" placeholder="搜索...">
                    <i class="fa fa-search"></i>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->isManager())
                                <li><a href="{{ url('/manage') }}"><i class="fa fa-btn fa-dashboard"></i> 后台管理</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> 注销</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>