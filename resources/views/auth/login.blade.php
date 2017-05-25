@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/login.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
    <div class="row">
           <div id="login">
                <h2>LOG IN</h2>
            </div>
            <div class="logform">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>

                                <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus />
                        </div>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                {{ $errors->first('username') }}
                            </span>
                        @endif

                        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                 <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>

                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required />
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif

                        <div id="note" class="input-group">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                            <span> | </span>             
                            <a href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>

                        <div class="input-group pull-right">
                            <button type="submit" class="btn btn-lg btn-primary ">Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <footer>
        <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
    </footer>
</div>
@endsection
