@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="/request" method="POST">
				{{ csrf_field() }}
				
			</form>
		</div>
	</div>
</div>

@endsection