@extends('layouts.app')


@section('content')
	<div class="container">
		<h1>{{$owner->name}}</h1>
		<div>
			@forelse($dorm as $test)
					<p> {{$test->user_id}}</p>
						
					
			
			@empty
				<p>No available rooms!</p>
			@endforelse
			

		</div>
		
	</div>
		
	
@endsection