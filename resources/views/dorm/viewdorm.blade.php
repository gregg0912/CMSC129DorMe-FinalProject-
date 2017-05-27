@extends('layouts.app')

<link href="{{ asset('../css/viewdorm.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link href="{{ asset('../css/home.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')

<div class="body-content">
	<h2>{{$dorm->dormName}}</h2>
	@if(Auth::user())
		@if($dorm->user_id == Auth::user()->id)
			<a href="javascript:void(0)"><span class="glyphicon glyphicon-edit"></span> Edit</a>
		@endif

	@endif
		<div id="info">
			
			<img src="{{$dorm->thumbnailPic}}" alt="Image Not Found" />
           		 <!-- 	<a data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-pencil">Edit Thumbnail</span> </a> -->
           	@if(Auth::user())
           		@if($dorm->user_id == Auth::user()->id)
	           		<button class="btn btn-primary" data-toggle="modal" data-target="#editThumbnail"><span class="glyphicon glyphicon-pencil"> Edit Thumbnail </span></button>
	           	@endif
           	@endif
				
		</div>

		<div id="est" class="well">
			<h4>Establishment Details</h4>
				<dl>
					<dt>Owner</dt>
						<dd>{{ $dorm->user->name }}</dd>
					<dt>Housing Type</dt>
						<dd>{{ $dorm->getHousingType() }}</dd>
					<dt>Location</dt>
						<dd>{{ $dorm->getlocation() }}</dd>
					<dt>Address</dt>
						<dd>{{$dorm->streetName}}, {{$dorm->barangayName}}</dd>
					<dt>Telephone Number</dt>
						<dd>{{$dorm->user->phone_number}}</dd>
				</dl>
		</div>

		<div id="roomdetails" class="well">
			<h4>Room Details</h4>
			@forelse($dorm->rooms as $key => $room)
				<h6>Room Type {{ $key+1 }}</h6>
				<dl>
					<dt>Maximum Number of Residents</dt>
						<dd>{{$room->maxNoOfResidents}}</dd>
					<dt>Type of Payment</dt>
						<dd>{{$room->typeOfPayment}}</dd>
					<dt>Price</dt>
						<dd>{{$room->price}}</dd>
					<dt>Availability</dt>
						<dd>{{$room->availability}}</dd>
				</dl>			
			@empty
				<p>No available rooms!</p>
			@endforelse
		</div>

		<div id="facilities" class="well">
			<h4>Facilities</h4>
			@forelse($dorm->facilities as $facility)
				<ul>{{$facility->facility_name}} </ul>
			@empty
				<p>No facilities found!</p>
			@endforelse
		</div>

		<div id="add_payments" class="well">
			<h4>Additional Payments</h4>
			@forelse($dorm->addons as $addon)
				<ul>{{$addon->add_item}} - Php {{$addon->add_price}} </ul>
			@empty
				<p>No additional payments!</p>
			@endforelse
		</div>
			
		<div id="gallery" class="well"">
				<h4>Gallery</h4>
				@forelse($dorm->images as $image)
				<ul>
					<img src="{{$image->image_path}}" alt="Image Not Found" />
				</ul>
				@empty
					<p>No pictures available</p>
				@endforelse
		</div>

		<div class="panel-body panel-default">
				<form action="{{ action('DormController@store') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="comment_id" value="{{ $dorm->id }}" />
					<textarea name="content" class="form-control"></textarea>
					<input type="submit" class="btn btn-success pull-right" value="Comment" />
				</form>
		</div>
		
		<div class="well">
			
			@forelse($dorm->comments->sortByDesc('id') as $comment)
				<div><p>{{ $comment->content }} <span>{{$comment->created_at}} </span> </p></div>
			@empty
				<p>You have no comments...</p>
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
		<div class="modal fade" id="uploadPics" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title" id="modalLabel">Upload Pictures</h3>
					</div>
					<div class="modal-body">
						<form action="/upload/{{$dorm->id}}" method="POST" id="pictures" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" name="dorm_id" value="{{ $dorm->id }}">
							<input type="file" name="images[]" multiple />
							<h4 id="msg"></h4>

							<button type="submit" id="uploadMulPics" class="btn btn-primary"> Submit </button>
						</form>
					</div>
				</div>
			</div>
		</div>
<footer>
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection