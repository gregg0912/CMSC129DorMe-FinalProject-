<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Manage</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                    <a href="{{ url('/view') }}">View</a>
                    <a href="{{ url('/about') }}">About</a>
                </div>
            @endif

            <div class="content">
            </div>
            <div class="body-content col-md-12 col-sm-12">
                <div id="establishments">
                    <h2>Featured Establishments</h2>
                    <div class="establishment row">
                        @forelse(App\Dorm::orderBy('votes', 'desc')->take(5)->get() as $dorm)
                            <div>
                                <a href="javascript:void(0)"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                                <div class="caption">
                                    <label><span>{{ $dorm->dormName }}</span></label>
                                    <p>{{ $dorm->user->name }}</p>
                                    <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                                    <p>{{ $dorm->getHousingType() }}</p>
                                </div>
                            </div>
                            
                        @empty

                        @endforelse
                    </div>
                    <div id="contacthome">
                        <h2>Contact Us</h2>
                        <p> Questions? Feedback? Suggestions? <br> We'd love to hear from you!<br>
                            Send us an email at <strong><a href="javascript:void(0)">support@dorme.com</a></strong> and we'll get back to you as soon as possible.<br>
                        </p>
                    </div>
                    <footer>
                        <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
                    </footer>
                    </div>
                    <a id="back-to-top" href="#" class="btn btn-default btn-lg to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
                </div>
            </div>
        </div>
    </body>
</html>
