@extends('layouts.app')

@section('content')

<div class="container">
	<form class="jumbotron">
		<fieldset>
			<legend>FILTER:</legend>
			<input type="text" name="keyword" placeholder="Search" class="form-control-srch" id="noborder" />
			@forelse(App\Facility::facilityList() as $facility)
			<label><input type="checkbox" name="facilityList[]" value="{{ $facility->facility_name }}" />{{ $facility->facility_name }}</label>
			@empty
			<label>No facilities were found!</label>
			@endforelse
			<div class="location">
				<label class="radio inline">
					<input type="radio" name="loc" value="dormArea" />
					<span>Dorm Area</span>
				</label>
				<label class="radio inline">
					<input type="radio" name="loc" value="banwa" />
					<span>Banwa</span>
				</label>
				<input type="submit" name="submit" value="Filter" />
				<a href="{{ url('/view') }}"><strong>Remove Filter</strong></a>
			</div>
		</fieldset>
	</form>

	<div id="establishments">
		<div id="estab-list">
			<div class="establishment row">
				@forelse($dorms as $dorm)
					<div>
						<a href="/dorm/viewdorm/{{$dorm->id}}"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                        <div class="caption">
                            <label><span>{{ $dorm->dormName }}</span></label>
                            <p>{{ $dorm->user->name }}</p>
                            <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                            <p>{{ $dorm->getHousingType() }}</p>
                            <p>{{ $dorm->location }} </p>
                            <p>{{ $dorm->id }} </p>

                        </div>
					</div>
				@empty
					<div>Your search returned no results!</div>
				@endforelse
				<div class="panel-body">
					{{ $dorms->links() }}
				</div>
			</div>
		</div>
	</div>

</div>
@endsection