@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your notifications</div>
                    <!-- <input type="submit"  name="approve" value="Approve Request" id="approve" class="btn btn-default"> -->
                    <table class="table">
                    	<!-- <thead>
                    	<tr>
                    	<th>All notifications are listed here.</th>
                    	</tr>
                    	</thead> -->
                    	<tbody>
                         @foreach($user->notifications as $notification) 
                          <tr>
                                @foreach($notification->data as $message)
                                <td> {{$message}} </td> 
                                @endforeach
                               
                          </tr>
                         @endforeach
                    	</tbody>
                    </table>

    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
