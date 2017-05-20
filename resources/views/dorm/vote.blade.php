@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form id="voteForm" role="form" action="" method="GET">
				<h1>Establishments</h1>
				<div class="establishments-holder">
					@forelse($dorms as $dorm)
						<div class="radio">
							<label>
								<input type="radio" name="establishment" id="{{ $dorm->id }}" value="{{ $dorm->id }}" /> {{ $dorm->dormName }}
							</label>
						</div>
					@empty
						<h4>No establishments  were found!</h4>
					@endforelse
				</div>

				@if(!$dorms->isEmpty())
					<div class="form-group">
						<input id="submit" type="submit" name="submit" class="btn btn-success" value="Submit" />
					</div>
				@endif
			</form>
		</div>
	</div>
	<div class="modal fade" id="errorModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Error Message</h4>
				</div>
				<div class="modal-body">
					<p>Please select an establishment to vote!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="successModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Success!</h4>
				</div>
				<div class="modal-body">
					<p>Thank you for voting!</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection