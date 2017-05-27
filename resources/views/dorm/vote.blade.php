@extends('layouts.app')


<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/style.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../css/vote.css') }}" />
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />


@section('content')

<div class="body-content">
		<div class="poll">
				<h2 class="text-center">Establishments</h2>
			<div class="poll-list">
			@if(Cookie::get('voted') !== null)
					@forelse($dorms as $dorm)
					<div>
						<label>{{ $dorm->dormName }}</label><span class="badge pull-right">{{ $dorm->votes }}</span>
					</div>
					@empty
						<h4>No establishments were found!</h4>
					@endforelse
			@else
				<form id="voteForm" action="/voteDorm/0" role="form" method="GET">
	                {{ csrf_field() }}
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
								<input id="submit" type="submit" name="submit" class="btn btn-success" value="Vote" />
							</div>
						@endif
				</form>
			</div>
			@endif
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

<footer>
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>

@endsection