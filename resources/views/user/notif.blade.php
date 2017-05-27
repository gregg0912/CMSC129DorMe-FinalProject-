@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
               
                    <!-- <input type="submit"  name="approve" value="Approve Request" id="approve" class="btn btn-default"> -->

                    @if(($user->notifications->count()!=0))
                    <div class="panel panel-default">
                     <div class="panel-heading">Your notifications</div>
                    <table class="table">
                    	<thead>
                    	<tr>
                    	<th>Message</th>
                        <th>Date</th>
                    	</tr>
                    	</thead>
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
                     @else
                        <h4>No notifications found!</h4>
                    @endif
                
                
           
        </div>
    </div>
</div>
@endsection
