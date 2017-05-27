@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                    <!-- <input type="submit"  name="approve" value="Approve Request" id="approve" class="btn btn-default"> -->
                    <table class="table">
                    	<thead>
                    	<tr>
                    	<th>Dorm Name</th>
                    	<th>Owner</th>
                    	<th>Action</th>
                    	</tr>
                    	</thead>
                    	<tbody>
                    		@for($i=0;$i<sizeOf($user);$i++)
                    		<tr>
                            <td>{{$dorm[$i]}}</td>
                            <td>{{$user[$i]}}</td>
                            <td><td><a href="/admin/confirm/{{$dormid[$i]}}" type="button" class="btn btn-primary">Approve</a></td></td>
                            <td><td><a href="/admin/reject/{{$dormid[$i]}}" type="button" class="btn btn-warning">Reject</a></td></td>
                            </tr>
                    		@endfor
                    	</tbody>
                    </table>

    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
