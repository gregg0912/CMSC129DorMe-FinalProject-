@extends('layouts.app')

<link href="{{ asset('../css/viewdorm.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link href="{{ asset('../css/home.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')

<div class="body-content">
	<h2>{{$dorm->dormName}}
		@if(Auth::user() AND $dorm->user_id == Auth::user()->id)
			<a href="/dorm/{{ $dorm->id }}/edit" class="small"><span class="glyphicon glyphicon-edit"></span> Edit Info</a>
		@endif
	</h2>
		<div id="info">

           	@if(Auth::user() AND $dorm->user_id == Auth::user()->id)
				<a  data-toggle="modal" data-target="#editThumbnail" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Change Photo</a>
           	@endif	
			<img src="{{$dorm->thumbnailPic}}" alt="Image Not Found" />
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
				<p class="nocomment">No available rooms!</p>
			@endforelse
		</div>

		<div id="facilities" class="well">
			<h4>Facilities</h4>
			@forelse($dorm->facilities as $facility)
				<ul>{{$facility->facility_name}} </ul>
			@empty
				<p class="nocomment">No facilities found!</p>
			@endforelse
		</div>

		<div id="add_payments" class="well">
			<h4>Additional Payments</h4>
			@forelse($dorm->addons as $addon)
				<ul>{{$addon->add_item}} - Php {{$addon->add_price}} </ul>
			@empty
				<p class="nocomment">No additional payments!</p>
			@endforelse
		</div>
			
		<div id="gallery" class="well"">
				<h4>Gallery</h4>
				@forelse($dorm->images as $image)
				<li>
					<img src="{{$image->image_path}}" alt="Image Not Found" />
				</li>
				@empty
					<p class="nocomment">No pictures available</p>
				@endforelse

				@if(Auth::user())
		           	@if($dorm->user_id == Auth::user()->id)
		           		<div id="btn-upload">
							<button class="btn btn-success" data-toggle="modal" data-target="#uploadPics">Upload</button>
						</div>
					@endif
	           	@endif
		</div>
		
		@if(Auth::guest())
			<div class="well">

				<form action="{{ action('DormController@store') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="comment_id" value="{{ $dorm->id }}" />
					<textarea name="content" class="form-control"></textarea>
					<br /><input id="btn-cmt" type="submit" class="btn btn-default" value="Comment" />
				</form>
			</div>
		@endif
		
		<div class="well">	
			<h4>Comments</h4>
			@forelse($dorm->comments->sortByDesc('id') as $comment)
				<div class="well well-cmt">

					<a href="/dorm/viewdorm/comment/{{$comment->id}}" class="btn btn-default">Delete</a>
					<p>{{ $comment->content }}</p>
					<span id="cmt-time">{{$comment->created_at}} </span> 
				</div>
			@empty
				<p class="nocomment">You have no comments...</p>
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
	</div>
<footer>
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection