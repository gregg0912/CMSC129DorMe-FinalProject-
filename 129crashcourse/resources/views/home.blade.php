@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                
                @forelse(Auth::user()->dorms() as $dorm)
                    <p>{{ $dorm }}</p>
                @empty
                    <p>WALA</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
