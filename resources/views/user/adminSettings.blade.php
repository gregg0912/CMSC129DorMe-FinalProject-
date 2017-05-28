@extends('layouts.app')

<link href="{{ asset('../css/adminsettings.css') }}" rel="stylesheet">
<link href="{{ asset('../css/style.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('../bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" />

@section('content')
<div class="body-content">
    <div class="well">
        <h3>Admin Dashboard</h3>
      
        @if((sizeOf($dorm)!=0))
        <table class="table">
            <thead>
                <tr>
                    <th>Dorm Name</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i < sizeOf($user); $i++)
                    <tr>
                        <td>{{$dorm[$i]}}</td>
                        <td>{{$user[$i]}}</td>
                        <td><a href="/admin/confirm/{{$dormid[$i]}}" type="button" class="btn btn-success"><span class=" glyphicon glyphicon-ok"></span></a>
                        <a href="/admin/reject/{{$dormid[$i]}}" type="button" class="btn btn-danger"><span class=" glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                @endfor
         	</tbody>
        </table>
        @else
            <h4>No dorm requests found!</h4>
        @endif
    </div>
</div>
<footer >
    <p>&copy; Dorme 2016 | A.Y. 2016-2017 CMSC 127: Fabilloren, Icay, Legada, Montano</p>
</footer>
@endsection
