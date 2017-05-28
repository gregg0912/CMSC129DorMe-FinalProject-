@extends('layouts.app')


<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link href="{{ asset('../css/request.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')

<div class="body-content">
		<div class="well">
			<a href="{{ url('/request/create') }}">Add A Request</a>
			@forelse ($requests as $key => $request)
				<h6>Request {{ $key+1 }}</h6>
				<div class="caption">
					<p>{{ $request->dormName }}</p>
					<p>{{ $request->streetName }}, {{ $request->barangayName }}</p>
					<p>{{ $request->getHousingType() }}</p>
					<p>{{ $request->getLocation() }}</p>
				</div>
			@empty
				<div id="noreq">
					<p>You haven't made any requests yet.</p>
				</div>
			@endforelse
		</div>
	</div>
</div>
<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection