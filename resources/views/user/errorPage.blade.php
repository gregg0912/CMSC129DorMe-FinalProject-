<style type="text/css">
	#errormsg{
		margin-top: 5%;
	}
	img{
		width: 100%;
		height: auto;
	}
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div id="errormsg" class="panel panel-danger">
        		<div class="panel-heading">
        			<h4>Error message</h4>
        		</div>
        		<div class="panel-body">
        			<div class="col-md-3">
        				<img src="/img-uploads/error.png" />
        			</div>
        			<div class="col-md-9">
        				<p class="text-center">Something went wrong. You were trying to access a page that you were not supposed to. Please choose a different blade</p>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
