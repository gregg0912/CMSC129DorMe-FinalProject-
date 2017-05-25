@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/email_blade.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
    <div class="row">
    <div >
           <div id="reset">
                <h2>Reset Password</h2>
            </div>
            <div class="logform">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request')  }}">
                        {{ csrf_field() }}

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
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                        <div class="input-group button-grp">
                            <button type="submit" class="btn btn-primary btn-reset">Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</div>
<footer>
        <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
    </footer>
@endsection
