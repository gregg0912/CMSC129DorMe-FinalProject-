@extends('layouts.app')

@section('content')

<div class="container">
	<div id="establishments">
		<div id="estab-list">
			<div class="establishment row">
				@forelse($dorms as $dorm)
					<div>
						<a href="javascript:void(0)"><img src="{{ $dorm->thumbnailPic }}" alt="IMAGE NOT FOUND" /></a>
                        <div class="caption">
                            <label><span>{{ $dorm->dormName }}</span></label>
                            <p>{{ $dorm->user->name }}</p>
                            <p>{{ $dorm->streetName }}, {{ $dorm->barangayName }}</p>
                            <p>{{ $dorm->getHousingType() }}</p>
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