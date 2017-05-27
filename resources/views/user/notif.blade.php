@extends('layouts.app')

<link href="{{ asset('../css/notifs.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<script rel="stylesheet" src="{{ URL::asset('../js/home.js') }}"></script>
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
               
                    <!-- <input type="submit"  name="approve" value="Approve Request" id="approve" class="btn btn-default"> -->

                    @if(($user->notifications->count()!=0))
                    
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
                      <div class="well">
                        <h4>No notifications found!</h4>
                        </div>
                    @endif
                
                
           
        </div>
    </div>
</div>
<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection
