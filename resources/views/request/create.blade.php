@extends('layouts.app')
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<style type="text/css">
	#reqform{

	}
</style>

@section('content')

<div class="body-content">
	<div id="reqform">
		<div class="container">

			<form action="/request" method="POST" role="form">


				{{ csrf_field() }}
				<fieldset>
					<legend>Establishment information</legend>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<input type="hidden" name="thumbnailPic" value="/img-uploads/no_image.png" />
					<div class="form-group {{ $errors->has('dormName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="dormName" placeholder="Establishment Name" value="{{ old('dormName') }}" />
						@if ($errors->has('dormName'))
							<span class="help-block">
								<strong>{{ $errors->first('dormName') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('streetName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="streetName" placeholder="Street Name" value="{{ old('streetName') }}" />
						@if ($errors->has('streetName'))
							<span class="help-block">
								<strong>{{ $errors->first('streetName') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('barangayName') ? ' has-error': '' }}">
						<input type="text" class="form-control" name="barangayName" placeholder="Barangay Name" value="{{ old('barangayName') }}" />
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
						<label class="checkbox-inline"><input type="radio" name="location" value="dormArea" 
							@if(!is_null(old('location')))
								@if('dormArea' == old('location'))
									checked
								@endif
							@endif /> Dorm Area
						</label>
						<label class="checkbox-inline"><input type="radio" name="location" value="banwa" 
							@if(!is_null(old('location')))
								@if('banwa' == old('location'))
									checked
								@endif
							@endif /> Banwa
						</label>
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
						<label class="checkbox-inline"><input type="radio" name="housingType" value="apartment"
							@if(!is_null(old('housingType')))
								@if('apartment' == old('housingType'))
									checked
								@endif
							@endif /> Apartment
						</label>
						<label class="checkbox-inline"><input type="radio" name="housingType" value="boardinghouse"
							@if(!is_null(old('housingType')))
								@if('boardinghouse' == old('housingType'))
									checked
								@endif
							@endif /> Boarding House</label>
						<label class="checkbox-inline"><input type="radio" name="housingType" value="dormitory"
							@if(!is_null(old('housingType')))
								@if('dormitory' == old('housingType'))
									checked
								@endif
							@endif /> Dormitory</label>
						<label class="checkbox-inline"><input type="radio" name="housingType" value="bedspace"
							@if(!is_null(old('housingType')))
								@if('bedspace' == old('housingType'))
									checked
								@endif
							@endif /> Bedspace</label>
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
						@forelse(App\Facility::facilityList() as $facility)
							<div class="radio">
								<label><input type="checkbox" name="facilities[]" value="{{ $facility->facility_name }}" 
									@if(!is_null(old('facilities')))
										@if(in_array($facility->facility_name , old('facilities')))
											checked 
										@endif
									@endif />{{ $facility->facility_name }}
								</label>
							</div>
						@empty
							<label>No facilities were found in the database!</label>
						@endforelse
						@if ($errors->has('facilities[]'))
							<span class="help-block">
								<strong>{{ $errors->first('facilities[]') }}</strong>
							</span>
						@endif
					</div>
					<button type="button" class="add-btn btn btn-success pull-right" id="add-facility" name="add-facility">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<fieldset id="RoomsGroup">
					<legend>Rooms</legend>
					<div id="roomDiv1">
						<div class="input-group">
							<div class="col-xs-4 {{ $errors->has('maxNum[]') ? 'has-error': '' }}">
								<label>Max residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="1" /></label>
							</div>
							<div class="col-xs-4 {{ $errors->has('typeOfPayment[]') ? 'has-error': '' }}">
								<label>Type of Payment:
									<select name="typeOfPayment[]" class="form-control">
										<option value="by_room">Per Room</option>
										<option value="by_person">Per person</option>
									</select>
								</label>
							</div>
							<div class="col-xs-4 {{ $errors->has('price[]') ? 'has-error': '' }}">
								<label>Price: <input type="number" name="price[]" min="500" value="500" class="form-control" /></label>
							</div>
						</div>
					</div>
					<button type="button" class="add-btn btn btn-success pull-right" id="add-room" name="add-room">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<fieldset id="AddOnGroup">
					<legend>Add-On</legend>
					<div id="addonDiv1" class="addonDiv">
						@forelse (App\Addon::addonList() as $addon)
							<div class="radio">
								<label><input type="checkbox" name="addon[]" value="{{ $addon->add_item }}-{{ $addon->add_price }}"
									@if(!is_null(old('facilities')))
										@if(in_array($addon, old('addon[]')))
											checked="checked"
										@endif
									@endif />{{ $addon->add_item }} - {{ $addon->add_price }}
								</label>
							</div>
						@empty
							<label>No addons were found in the database!</label>
						@endforelse
					</div>
					<button type="button" class="add-btn btn btn-success pull-right" id="add-addon" name="add-addon">
						<span class="glyphicon glyphicon-plus-sign"></span> Add
					</button>
				</fieldset>
				<div class="pull-left">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="addFacilityModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten textboxes for the facility can be added.</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addRoomModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten inputs for the room can be added.</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addAddonModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Only ten textboxes for the addon can be added.</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection