@extends('layouts.app')
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" action="/request" method="POST" role="form">
				{{ csrf_field() }}
				<fieldset>
					<legend>Establishment information</legend>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="hidden" name="thumbnailPic" value="/img-uploads/no_image.png" />
					<div class="input-group {{ $errors->has('dormName') ? ' has-error': '' }}">
						<input type="text" name="dormName" placeholder="Establishment Name" value="{{ old('dormName') }}" />
						@if ($errors->has('dormName'))
							<span class="help-block">
								<strong>{{ $errors->first('dormName') }}</strong>
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
					<legend>Establishment Location</legend>
					<div class="input-group {{ $errors->has('location') ? ' has-error': '' }}">
						<label><input type="radio" name="location" value="dormArea" /> Dorm Area</label>
						<label><input type="radio" name="location" value="banwa"> Banwa</label>
						@if ($errors->has('location'))
							<span class="help-block">
								<strong>{{ $errors->first('location') }}</strong>
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
					<div class="input-group {{ $errors->has('facilities') ? ' has-error': '' }}" id="FacilitiesGroup" name="FacilitiesGroup">
						@forelse(App\Facility::facilityList() as $facility)
							<label><input type="checkbox" name="facilities[]" value="{{ $facility->facility_name }}">{{ $facility->facility_name }}</label>
						@empty
							<label>No facilities were found in the database!</label>
						@endforelse
						@if ($errors->has('facilities'))
							<span class="help-block">
								<strong>{{ $errors->first('facilities') }}</strong>
							</span>
						@endif
					</div>
					<button type="button" class="add-btn btn btn-success" id="add-facility" name="add-facility">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<fieldset id="RoomsGroup">
					<legend>Rooms</legend>
					<div id="roomDiv1">
						<label>Maximum number of residents: <input type="number" name="maxNum[]" min="1" value="1" /></label>
						<label>
							Type of Payment:
							<select name="typeOfPayment[]">
								<option value="by_room">Per Room</option>
								<option value="by_person">Per person</option>
							</select>
						</label>
						<label>Price: <input type="number" name="price[]" min="500" value="500" /></label>
					</div>
					<button type="button" class="add-btn btn btn-success" id="add-room" name="add-room">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<fieldset id="AddOnGroup">
					<legend>Add-On</legend>
					<div id="addonDiv1" class="addonDiv">
						@forelse (App\Addon::addonList() as $addon)
							<label><input type="checkbox" name="addon[]" value="{{ $addon->add_item }}-{{ $addon->add_price }}">{{ $addon->add_item }} - {{ $addon->add_price }}</label>
						@empty
							<label>No addons were found in the database!</label>
						@endforelse
					</div>
					<button type="button" class="add-btn btn btn-success" id="add-addon" name="add-addon">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<input type="submit" name="submit" value="Submit" />
			</form>
		</div>
	</div>
	<div class="modal fade" id="addFacilityModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten textboxes for the facility can be added.</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addRoomModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten textboxes for the room can be added.</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addAddonModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten textboxes for the addon can be added.</h4>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection