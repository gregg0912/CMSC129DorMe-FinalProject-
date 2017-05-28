@extends('layouts.app')

<link href="{{ asset('../css/view.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<script rel="stylesheet" src="{{ URL::asset('../js/home.js') }}"></script>
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')

<div class="body-content col-md-12">
	<form id="filter" class="col-md-12 col-sm-12">
		<fieldset>
			<legend>FILTER:</legend>

			<div id="search-input">
                    <div class="input-group">
                            <input type="text" name="keyword" class="search-query form-control" placeholder=" Search..." />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div id="dropdown-grp">
	            <div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Choose facilities
					<span class="caret"></span></button>
				  	<ul class="dropdown-menu">
					    <li>
					    	  <div class="checkboxes">
								@forelse(App\Facility::facilityList() as $facility)
								<label><input type="checkbox" name="facilityList[]" value="{{ $facility->facility_name }}" />{{ $facility->facility_name }}</label>
								@empty
								<label>No facilities were found!</label>
								@endforelse
							</div>
					    </li>
				  	</ul>
				</div>
	 			<div class="dropdown drop-loc">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Choose location
					<span class="caret"></span></button>
				  	<ul class="dropdown-menu">
					    <li>
					    	 <div class="location">
								<label class="radio inline">
									<input type="radio" name="loc" value="dormArea" />
									<span>Dorm Area</span>
								</label>
								<label class="radio inline">
									<input type="radio" name="loc" value="banwa" />
									<span>Banwa</span>
								</label>
							</div>
					    </li>
				  	</ul>
				</div>
			</div>
			<div id="pc-checkboxes" class="checkboxes">
				@forelse(App\Facility::facilityList() as $facility)
					<label><input class="cb" type="checkbox" name="facilityList[]" value="{{ $facility->facility_name }}" />{{ $facility->facility_name }}</label>
				@empty
					<label>No facilities were found!</label>
				@endforelse
			</div>

			<div id="pc-location" class="location">
				<label class="radio inline">
					<input type="radio" name="loc" value="dormArea" />
					<span>Dorm Area</span>
				</label>
				<label class="radio inline">
					<input type="radio" name="loc" value="banwa" />
					<span>Banwa</span>
				</label>
			</div>
			<div id="filter-buttons">
				<button type="submit" name="submit" class="btn btn-primary">Filter</button><br />
				<a href="{{ url('/view') }}" disabled><strong>Remove Filter</strong></a>
			</div>
			
		</fieldset>
	</form>

	<div id="establishments">
		<div id="estab-list">
			<div class="establishment">
				@forelse($dorms as $dorm)
					<div>
						<a href="/dorm/viewdorm/{{$dorm->id}}"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                        <div class="caption">
                            <label><span>{{ $dorm->dormName }}</span></label>
                            <p>{{ $dorm->user->name }}</p>
                            <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                            <p>{{ $dorm->getHousingType() }}</p>
                        </div>
					</div>
				@empty
					<div id="no-results" class="col-md-12 col-sm-12">
						Your search returned no results!
					</div>
				@endforelse
				<div class="pagination">
					{{ $dorms->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection