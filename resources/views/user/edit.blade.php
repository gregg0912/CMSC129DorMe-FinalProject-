@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel-body panel-default">
				<form action="/user/settings/{{ $user->id }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="text" name="name" value="{{ $user->name }}" />
					<input type="text" name="username" value="{{ $user->username }}" />
					<input type="date" name="bdate" value="{{ $user->bdate->toDateString() }}" />

					<input type="text" name="email" value="{{ $user->email }}" />
					<input type="text" name="password" value="{{ $user->password }}" />
					<input type="submit" class="btn btn-success pull-right" value="Rant" />
				</form>
			</div>
		</div>
	</div>
@endsection