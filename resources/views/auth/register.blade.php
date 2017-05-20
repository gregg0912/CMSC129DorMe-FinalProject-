@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/registration.css') }}" />

@section('content')
<div class="body-content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-group input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>

                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus />

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">@</span>

                                <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus />

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">@</span>

                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required />

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">@</span>

                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required />

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">@</span>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required />
                        </div>

                        <div class="input-group input-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="sizing-addon1">@</span>

                                <input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}" required />

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group">
                            <div class=" col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
    </footer>
</div>
@endsection
