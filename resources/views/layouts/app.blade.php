<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DorMe') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <style type="text/css">
        .modal-content{
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active"><img class="carousel-image" src="../img-uploads/bg/1.JPG" alt="image not found" /></div>
                    <div class="item"><img class="carousel-image" src="../img-uploads/bg/2.png" alt="image not found" /></div>
                    <div class="item"><img class="carousel-image" src="../img/thumbnails/foursisters.JPG" alt="image not found" /></div>
                </div>
            </div>
        <div id='dorme-main-header' class="col-md-10 col-sm-10">
            <img src="../img-uploads/sm.png" alt="DORME" />
            <h2>find your home away from home</h2>
            <p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
                Scroll through featured dormitories and apartments on our home page and <br />
                have an easy glimpse into finding your perfect second home!<br />
                Sit back and pick your like.
            </p>
        </div>
   

        <nav id="gen-nav" class="nav navbar-inverse col-md-12 col-sm-12" data-spy="affix" data-offset-top="350">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button id="menu" class="navbar-toggle" data-toggle="collapse" data-target="#glyph-menu">
                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'DorMe') }}</a>
                </div>
                <div id="glyph-menu" class="collapse navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav pull-left">
                        <li>
                            <a href="javascript:void(0)">
                                Welcome
                                @if (Auth::guest())
                                    dear guest!
                                @elseif (Auth::user()->role == 0)
                                    {{ Auth::user()->name }}!
                                @else
                                    admin!
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ url('/view') }}">View</a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/vote') }}">Poll</a></li>
                        @else
                            @if((Auth::user()->role)!=1)
                            <li><a href="{{ url('/home/show') }}">Manage</a></li>
                            @else
                            <li><a href="{{ url('/admin')}}">Requests</a></li>

                            @endif
                        @endif
                        <li><a href="{{ url('/about') }}">About</a></li>
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Sign up</a></li>
                        @else
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
