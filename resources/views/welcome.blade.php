@extends('layouts.app')

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/home.css') }}" />
<script rel="stylesheet" src="{{ URL::asset('../js/script1.js') }}"></script>
<script rel="stylesheet" src="{{ URL::asset('../js/home.js') }}"></script>


@section('content')

<div class="flex-center position-ref full-height">
    <div class="body-content col-md-12 col-sm-12">
        <div id="establishments">
            <h2>Welcome
            @if (Auth::guest())
                dear guest!
            @elseif (Auth::user()->role == 0)
                {{ Auth::user()->name }}!
            @else
                admin!
            @endif</h2>
            <h3>Featured Establishments</h3>
            <div class="establishment row">
                @forelse(App\Dorm::orderBy('votes', 'desc')->take(5)->get() as $dorm)
                    <div>
                        <a href="/dorm/viewdorm/{{$dorm->id}}"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                        <div class="caption">
                            <label><span>{{ $dorm->dormName }}</span></label>
                            <p>{{ $dorm->user->name }}</p>
                            <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                            <p>{{ $dorm->getHousingType() }}</p>
                        </div>
                    </div>
                    
                @empty
                    <div>
                        <a href="javascript:void(0)"><img src="" alt="IMAGE NOT FOUND" /></a>
                        <div class="caption">
                            <p>There are no dormitories in this database yet!</p>
                        </div>
                    </div>
                @endforelse
            </div>
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
            
        <a id="back-to-top" href="#" class="btn btn-default btn-lg to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
    </div>
</div>
@endsection
