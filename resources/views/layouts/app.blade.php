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
    //<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                    <div class="item active"><img class="carousel-image" src="../img/thumbnails/bettys.JPG" alt="image not found" /></div>
                    <div class="item"><img class="carousel-image" src="../img/thumbnails/firstestate.JPG" alt="image not found" /></div>
                    <div class="item"><img class="carousel-image" src="../img/thumbnails/foursisters.JPG" alt="image not found" /></div>
                </div>
            </div>
        <div id='dorme-main-header' class="col-md-10 col-sm-10">
            <h1>DorMe.</h1>
            <h2>your dorm. my dorm. our dorm.</h2>
            <p> Looking for convenience? Look no further. Dorme is here for your new place to dwell!<br />
                Scroll through featured dormitories and apartments on our home page and <br />
                have an easy glimpse into finding your perfect second home!<br />
                Sit back and pick your like.
            </p>
        </div>
   

        <nav id="gen-nav" class="nav navbar-inverse col-md-12 col-sm-12" data-spy="affix" data-offset-top="350">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button id="menu" class="navbar-toggle" data-toggle="collapse" data-target="#glyph-menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
                </div>
                <div id="glyph-menu" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-left">
                        <li class="fromLeft"><a href="home.php">Home</a></li>
                        <li class="fromLeft"><a href="view.php">View</a></li>
                        <li class="fromLeft"><a href="poll.php">Poll</a></li>
                        <li class="fromLeft"><a href="about.php">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown"><a aria-expanded="true" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Log In</a>
                            <ul class="dropdown-menu">
                                <li><a href="adminlogin.php">Admin</a></li>
                                <li><a href="login.php">Owner</a></li>
                            </ul>
                        </li>
                        <li><a href="registration.php">Sign Up</a></li>
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
