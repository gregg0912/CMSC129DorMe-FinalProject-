@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div id = "establishments" class="panel-body">
                    <div id="estab-list">
                        <div class="establishment row">
                            @forelse($dorms as $dorm)
                                <div>

                                    <a href="/dorm/viewdorm/{{$dorm->id}}"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                                    <form class="form-delete" action="/dorm/{{ $dorm->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                   <input type="submit"  name="delete" value="Delete" id="delete" class="btn btn-danger">

                                    </form>
                                    <div class="caption">
                                        <label><span>{{ $dorm->dormName }}</span></label>
                                        <p>{{ $dorm->user->name }}</p>
                                        <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                                        <p>{{ $dorm->getHousingType() }}</p>
                                        <p>{{ $dorm->location }} </p>
                                        <p>{{ $dorm->id }} </p>

                                    </div>
                                </div>
                            @empty
                                <div>You have no dorms!</div>
                            @endforelse
                            <div class="panel-body">
                                {{ $dorms->links() }}
                            </div>
                        </div>
        </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
