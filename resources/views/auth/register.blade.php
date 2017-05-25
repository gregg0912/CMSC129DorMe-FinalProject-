@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/registration.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
    <div class="row">
           <div id="signin">
                <h2>SIGN UP</h2>
                <p>
                    Please fill in the form below.
                </p>
            </div>
            <div class="logform">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="role" value="0" />
                        <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </span>

                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus />
 
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif

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
                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                 <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>

                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required />
                              
                        </div>
                         @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
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
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                            </span>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required />
                        </div>

                        <div class="input-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                            </span>

                                <input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" required />

                              
                        </div>
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                {{ $errors->first('phone_number') }}
                            </span>
                        @endif
                        <div class="input-group button-grp pull-right">
                            <button type="submit" class="btn btn-primary btn-signin">Sign up
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
