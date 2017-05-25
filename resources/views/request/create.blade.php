@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" action="/request" method="POST" role="form">
				{{ csrf_field() }}
				<fieldset>
					<legend>Establishment information</legend>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<div class="input-group {{ $errors->has('dormName') ? ' has-error': '' }}">
						<input type="text" name="dormName" placeholder="Establishment Name" value="{{ old('dormName') }}" />
						@if ($errors->has('dormName'))
							<span class="help-block">
								<strong>{{ $errors->first('dormnName') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-group {{ $errors->has('streetName') ? ' has-error': '' }}">
						<input type="text" name="streetName" placeholder="Street Name" value="{{ old('streetName') }}" />
						@if ($errors->has('streetName'))
							<span class="help-block">
								<strong>{{ $errors->first('streetName') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-group {{ $errors->has('barangayName') ? ' has-error': '' }}">
						<input type="text" name="barangayName" placeholder="Barangay Name" value="{{ old('barangayName') }}" />
						@if ($errors->has('barangayName'))
							<span class="help-block">
								<strong>{{ $errors->first('barangayName') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Contact Information</legend>
					<div class="input-group {{ $errors->has('') ? ' has-error': '' }}">
						
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

@endsection