@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>{{$dorm->dormName}}</h1>
            <a href="javascript:void(0)"><span class="glyphicon glyphicon-edit"></span> Edit</a>
			<div id="info">
				<h2>Establishment Details</h2>
				<img src="{{$dorm->thumbnailPic}}" alt="Image Not Found" />
            <!-- 	<a data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-pencil">Edit Thumbnail</span> </a> -->
            	<button class="btn btn-primary" data-toggle="modal" data-target="#editThumbnail"><span class="glyphicon glyphicon-pencil"> Edit Thumbnail </span></button>

				<div id="est">
					<dl>
						<dt>Owner</dt>
						<dd>{{ $dorm->user->name }}</dd>
						<dt>Housing Type</dt>
						<dd>{{ $dorm->getHousingType() }}</dd>
						<dt>Location</dt>
						<dd>{{ $dorm->getlocation() }}</dd>
						<dt>Address</dt>
						<dd>{{$dorm->streetName}} , {{$dorm->barangayName}}</dd>
						<dt>Telephone Number</dt>
						<dd>{{$dorm->user->phone_number}}</dd>
					</dl>
				</div>
			</div>
			<div id="roomdetails">
				<h2>Room Details</h2>
				@forelse($dorm->rooms as $room)
					
						<dt>Maximum Number of Residents</dt>
							<dd>{{$room->maxNoOfResidents}}</dd>
						<dt>Type of Payment</dt>
							<dd>{{$room->typeOfPayment}}</dd>
						<dt>Price</dt>
							<dd>{{$room->price}}</dd>
						<dt>Availability</dt>
							<dd>{{$room->availability}}</dd>
					
			
				@empty
					<p>No available rooms!</p>
				@endforelse

			</div>
			<div id="facilities">
				<h2>Facilities</h2>
				@forelse($dorm->facilities as $facility)
						<ul>{{$facility->facility_name}} </ul>
				@empty
					<p>No facilities found!</p>
				@endforelse

			</div>
			<div id="add_payments">
				<h2>Additional Payments</h2>
				@forelse($dorm->addons as $addon)
						<ul>{{$addon->add_item}} - Php {{$addon->add_price}} </ul>
					
				@empty
					<p>No additional payments!</p>
				@endforelse
			</div>
			
			<div class="modal fade" id="editThumbnail" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title" id="modalLabel">Edit Thumbnail</h3>
						</div>
						<div class="modal-body">
							<form action="/editThumbnail/{{$dorm->id}}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" name="dorm_id" value="{{ $dorm->id }}">
								<input type="file" name="image" />
								<button type="submit" class="btn btn-primary"> Submit </button>
							</form>
						</div>
					</div>
					
				</div>
				
			</div>


			
		</div>	
	</div>
</div>
@endsection