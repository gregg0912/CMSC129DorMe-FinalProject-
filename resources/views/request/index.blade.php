@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a href="{{ url('/request/create') }}">Add A Request</a>
			@forelse ($requests as $request)
				<div class="caption">
					<p>{{ $request->dormName }}</p>
					<p>{{ $request->streetName }}, {{ $request->barangayName }}</p>
					<p>{{ $request->getHousingType() }}</p>
					<p>{{ $request->getLocation() }}</p>
				</div>
			@empty
				<div>You haven't made any requests yet.</div>
			@endforelse
		</div>
	</div>
</div>

@endsection