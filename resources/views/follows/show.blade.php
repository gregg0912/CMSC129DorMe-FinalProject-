@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel-body panel-default text-center">
				<img class="profile-img" src="/img-uploads/profile-pic.png">
				<h1>{{ $user->name }}<i>({{ $user->username }})</i></h1>
				<h4>{{ $user->email }}</h4>
				<h4>{{ $user->bdate->format('l j F Y') }} ({{ $user->bdate->age}} years old)</h4>
				<input type="submit" class="btn btn-success" value="Follow" id="follow">
			</div>
		</div>
	</div>
	<div class="row">
		
		@foreach($user->posts as $post)
		<!-- 	<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<a href="#" id="follower-count-{{$user->id}}" class="btn btn-info">{{$user->username}}</a>
					
				</div>
 -->
				  <!-- Modal
				 
			</div> -->
		@empty
			No results found
		@endforeach

	</div>	
	
@endsection