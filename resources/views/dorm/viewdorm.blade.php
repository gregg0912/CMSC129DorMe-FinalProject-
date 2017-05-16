@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>{{$dorm->dormName}}</h1>
			<div id="info">
				<h2>Establishment Details</h2>
				<img src="{{$dorm->thumbnailPic}}" alt="Image Not Found" />
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
			


			
		</div>	
	</div>
</div>
@endsection