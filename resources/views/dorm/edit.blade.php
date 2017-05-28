@extends('layouts.app')
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />
<script type="text/javascript" src="scriptEditDorm.js"></script>
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12">
			<form class="form-horizontal" action="/dorm" method="POST" role="form">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<fieldset>
					<legend>Establishment information</legend>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="hidden" name="thumbnailPic" value="{{ $dorm->thumbnailPic }}" />
					<input type="hidden" name="votes" value="{{ $dorm->votes }}" />
					<div class="form-group {{ $errors->has('dormName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="dormName" placeholder="Establishment name" value="{{ old('dormName', $dorm->dormName) }}" value="{{ old('dormName') }}" />
						@if ($errors->has('dormName'))
							<span class="help-block">
								<strong>{{ $errors->first('dormName') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('streetName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="streetName" placeholder="Street name" value="{{ old('streetName', $dorm->streetName) }}" />
						@if ($errors->has('streetName'))
							<span class="help-block">
								<strong>{{ $errors->first('streetName') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('barangayName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="barangayName" placeholder="Barangay Name" value="{{ old('barangayName', $dorm->barangayName) }}" />
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
						<label class="checkbox-inline"><input type="radio" name="location" value="dormArea" @if(!is_null(old('location')))
							@if('dormArea' == old('location'))
								checked
							@endif
						@else
							@if('dormArea' == $dorm->location)
								checked
							@endif
						@endif /> Dorm Area</label>
						<label class="checkbox-inline"><input type="radio" name="location" value="banwa"
						@if(!is_null(old('location')))
							@if('dormArea' == old('location'))
								checked
							@endif
						@else
							@if('dormArea' == $dorm->location)
								checked
							@endif
						@endif /> Banwa</label>
						@if ($errors->has('location'))
							<span class="help-block">
								<strong>{{ $errors->first('location') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Housing Type</legend>
					<div class="{{ $errors->has('housingType') ? ' has-error': '' }}">
						<label class="checkbox-inline">
							<input type="radio" name="housingType" value="apartment"
								@if(!is_null(old('housingType')))
									@if('apartment' == old('housingType'))
										checked
									@endif
								@else
									@if('apartment' == $dorm->housingType)
										checked
									@endif
								@endif
							 /> Apartment
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="housingType" value="boardinghouse"
								@if(!is_null(old('housingType')))
									@if('boardinghouse' == old('housingType'))
										checked
									@endif
								@else
									@if('boardinghouse' == $dorm->housingType)
										checked
									@endif
								@endif
							 /> Boarding House
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="housingType" value="dormitory"
								@if(!is_null(old('housingType')))
									@if('dormitory' == old('housingType'))
										checked
									@endif
								@else
									@if('dormitory' == $dorm->housingType)
										checked
									@endif
								@endif
							 /> Dormitory
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="housingType" value="bedspace"
								@if(!is_null(old('housingType')))
									@if('dormitory' == old('housingType'))
										checked
									@endif
								@else
									@if('dormitory' == $dorm->housingType)
										checked
									@endif
								@endif
							 /> Bedspace
						</label>
						@if ($errors->has('housingType'))
							<span class="help-block">
								<strong>{{ $errors->first('housingType') }}</strong>
							</span>
						@endif
					</div>
				</fieldset>
				<fieldset>
					<legend>Facilities</legend>
					<div class="{{ $errors->has('facilities[]') ? ' has-error': '' }}" id="FacilitiesGroup" name="FacilitiesGroup">
						@forelse($dorm->facilities as $key => $facility)
							<div id="facilityTextbox{{ $key+1 }}" class="form-group">
								<div class="input-group">
									<input type="text" name="facilities[]" class="form-control" value="{{ $facility->facility_name }}" />
									<span class="input-group-btn">
										<button type="button" id="edit-removeFacility" class="btn btn-danger">
											<span class="glyphicon glyphicon-minus-sign"></span> Remove
										</button>
									</span>
								</div>
							</div>
						@empty
							<div id="facilityTextbox1" class="form-group">
								<div class="input-group">
									<input type="text" name="facilities[]" class="form-control" placeholder="Facility Name" />
									<span class="input-group-btn">
										<button type="button" class="btn btn-danger" id="edit-removeFacility" >
											<span class="glyphicon glyphicon-minus-sign"></span> Remove
										</button>
									</span>
								</div>
							</div>
						@endforelse
						<button type="button" class="btn btn-success pull-right" id="edit-addFacility"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
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
						<div id="roomDiv{{ $key+1 }}" class="form-group">
							<div class="input-group">
								<div class="col-xs-3">
									<label>Max residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="{{ $room->maxNoOfResidents }}" /></label>
								</div>
								<div class="col-xs-3">
									<label>Type of Payment:
										<select name="typeOfPayment[]" class="form-control">
											<option value="by_room"  @if($room->typeOfPayment =='by_room') selected @endif>Per room</option>
											<option value="by_person" @if($room->typeOfPayment =='by_person') selected @endif>Per person</option>
										</select>
									</label>
								</div>
								<div class="col-xs-3">
									<label>Price: <input type="number" class="form-control" name="price[]" min="500" value="{{ $room->price }}" /></label>
								</div>
								<div class="col-xs-3">
									<span style="visibility: hidden">Remove</span>
									<button type="button" class="btn btn-danger" id="edit-removeRoom"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>
								</div>
							</div>
						</div>
					@empty
						<div id="roomDiv1" class="form-group">
							<div class="input-group">
								<div class="col-xs-3">
									<label>Max residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="1"></label>
								</div>
								<div class="col-xs-3">
									<label>Type of Payment: 
										<select name="typeOfPayment[]" class="form-control">
											<option value="by_room">Per room</option>
											<option value="by_person">Per person</option>
										</select>
									</label>
								</div>
								<div class="col-xs-3">
									<label>Price: <input type="number" class="form-control" name="price[]" min="500" value="500" /></label>
								</div>
								<div class="col-xs-3">
									<button type="button" class="btn btn-danger" id="edit-removeRoom"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>
								</div>
							</div>
						</div>
					@endforelse
					<button type="button" class="btn btn-success pull-right" id="edit-addRoom"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
				</fieldset>
				<fieldset>
					<legend>Additional Payments</legend>
					@forelse($dorm->addons as $key => $addon)
					<div id="addonDiv{{ $key+1 }}" class="form-group">
						<div class="input-group">
							<input type="text" name="add_item[]" class="form-control" placeholder="Addon name" value="{{ $addon->add_item }}" />
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-rub"></span>
							</div>
							<input type="number" name="add_price[]" class="form-control" min="100" value="{{ $addon->add_price }}" />
							<div class="input-group-btn">
								<button type="button" class="btn btn-danger" id="edit-removeAddon"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>
							</div>
						</div>
					</div>
					@empty
					<div id="addonDiv1">
						<div class="input-group">
							<input type="text" class="form-control" name="add_item[]" placeholder="Addon name" />
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-rub"></span>	
							</div>
							<input type="number" class="form-control" name="add_price[]" min="100" />
							<div class="input-group-btn">
								<button type="button" class="btn btn-danger" id="edit-removeAddon"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>
							</div>
						</div>
					</div>
					@endforelse
					<button type="button" class="btn btn-success pull-right" id="edit-addAddon"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
				</fieldset>
				<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="facilityError">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Only ten inputs for the facilities can be added.</h4>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addonError">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Only ten inputs for the addons can be added.</h4>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="roomError">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Only ten inputs for the rooms can be added.</h4>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="facilityRemoveError">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>You cannot remove any more facilities.</h4>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="roomRemoveError">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>You cannot remove any more rooms.</h4>
			</div>
		</div>
	</div>
</div>
<footer>
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection