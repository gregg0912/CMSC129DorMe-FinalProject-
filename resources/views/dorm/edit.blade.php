@extends('layouts.app')
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12">
			<form class="form-horizontal" action="/dorm" method="POST" role="form">
				{{ csrf_field() }}
				<fieldset>
					<legend>Establishment information</legend>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="hidden" name="thumbnailPic" value="{{ $dorm->thumbnailPic }}" />
					<div class="input-group {{ $errors->has('dormName') ? ' has-error': '' }}">
						<input type="text" name="dormName" placeholder="{{ old('dormName', $dorm->dormName) }}" value="{{ old('dormName') }}" />
						@if ($errors->has('dormName'))
							<span class="help-block">
								<strong>{{ $errors->first('dormName') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-group {{ $errors->has('streetName') ? ' has-error': '' }}">
						<input type="text" name="streetName" placeholder="{{ old('streetName', $dorm->streetName) }}" />
						@if ($errors->has('streetName'))
							<span class="help-block">
								<strong>{{ $errors->first('streetName') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-group {{ $errors->has('barangayName') ? ' has-error': '' }}">
						<input type="text" name="barangayName" placeholder="{{ old('barangayName', $dorm->barangayName) }}" />
						@if ($errors->has('barangayName'))
							<span class="help-block">
								<strong>{{ $errors->first('barangayName') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Housing Type</legend>
					<div class="input-group {{ $errors->has('housingType') ? ' has-error': '' }}">
						<label><input type="radio" name="housingType" value="apartment" /> Apartment</label>
						<label><input type="radio" name="housingType" value="boardinghouse" /> Boarding House</label>
						<label><input type="radio" name="housingType" value="dormitory" /> Dormitory</label>
						<label><input type="radio" name="housingType" value="bedspace" /> Bedspace</label>
						@if ($errors->has('housingType'))
							<span class="help-block">
								<strong>{{ $errors->first('housingType') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Facilities</legend>
					<div class="input-group {{ $errors->has('facilities[]') ? ' has-error': '' }}" id="FacilitiesGroup" name="FacilitiesGroup">
						@forelse($dorm->facilities as $key => $facility)
							<div id="facilityTextbox{{ $key+1 }}">
								<input type="text" name="facilities[]" class="form-control" value="{{ $facility->facility_name }}" /><button type="button" id="edit-removeFacility" class="btn btn-danger"><span class="glyhpicon glyphicon-minus-sign"></span> Remove</button>
							</div>
						@empty
							<div id="facilityTextbox1">
								<input type="text" name="facilities[]" class="from-control" placeholder="Facility Name" /><button type="button" class="btn btn-danger" id="edit-removeFacility" ><span class="glyphicon glyphicon-minus-sign"></span></button>
							</div>
						@endforelse
						<button type="button" class="btn btn-success" id="edit-addFacility"></button>
						@if ($errors->has('facilities[]'))
							<span class="help-block">
								<strong>{{ $errors->first('facilities[]') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Rooms</legend>
					@forelse($dorm->rooms as $key => $room)

					@empty
						<div class="roomDiv1">
							<label>Maximum number of residents: <input type="number" name="maxNum[]" min="1" value="1"></label>
							<label>Type of Payment: 
								<select name="typeOfPayment[]">
									<option value="by_room">Per room</option>
									<option value="by_person">Per person</option>
								</select>
							</label>
							<label>Price: <input type="number" name="price[]" min="500" value="500" /></label>
							<button type="button" class="btn btn-danger" id="edit-removeRoom"><span class="glyhpicon glyphicon-minus-sign"></span> Remove</button>
						</div>
					@endforelse
					<button type="button" class="btn btn-danger" id="edit-addRoom"><span class="btn btn-success"></span> Add</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection