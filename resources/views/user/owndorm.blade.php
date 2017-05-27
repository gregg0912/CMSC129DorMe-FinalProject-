@extends('layouts.app')

<link href="{{ asset('../css/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <div id="dash">
                    <h3>Dashboard</h3>
                    <a href="{{ url('/request') }}">View Requests</a>
                </div>
                <div class="establishment panel panel-default">
                    @forelse($dorms as $dorm)
                    <div>
                        <a href="/dorm/viewdorm/{{$dorm->id}}"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                        <form class="form-delete" action="/dorm/{{ $dorm->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit"  name="delete" value="Remove" id="delete" class="btn btn-danger btn-sm" />
                        </form>

                        <div class="caption">
                            <label><a href="/dorm/viewdorm/{{ $dorm->id }}">{{ $dorm->dormName }}</a></label>
                            <p>{{ $dorm->user->name }}</p>
                            <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                            <p>{{ $dorm->getHousingType() }}</p>
                            <p>{{ $dorm->getLocation() }} </p>
                        </div>
                    </div>
                    @empty
                        <div>You have no dorms!</div>
                    @endforelse
                        <div >
                            {{ $dorms->links() }}
                        </div>
                </div>
            </div>
        </div>
</div>
<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection
