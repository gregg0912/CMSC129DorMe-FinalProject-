@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form role="form">
				<h1>Establishments</h1>
				@forelse($dorms as $dorm)
					<div class="radio">
						<label>
							<input type="radio" name="establishment" id="{{ $dorm->id }}" value="{{ $dorm->id }}" /> {{ $dorm->dormName }}
						</label>
					</div>
				@empty
					<h4>No establishments  were found!</h4>
				@endforelse

				@if(!$dorms->isEmpty())
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success" value="Submit" />
					</div>
				@endif
			</form>
		</div>
	</div>
</div>

@endsection