@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{ $post->user->name }}</span>
					<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
				</div>
				<div class="panel-body panel-default">
					{{$post->content}}
				</div>
				<div class="panel-footer clearfix">
					<a href="/posts/{{ $post->id}}/edit" class="btn btn-success">Edit</a>
					<form class="form-delete" action="/posts/{{ $post->id }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<input type="submit" class="btn btn-success" value="Delete" />
					</form>
					<a href="#" class="pull-right">Hear, hear!</a>
				</div>
			</div>
		</div>
	</div>
@endsection