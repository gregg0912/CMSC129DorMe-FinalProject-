@extends('layouts.app')


@section('content')
	<div class="row">
		
		@forelse($posts as $post)
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>{{ $post->user->name }}</span>
						<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
					</div>
					<div class="panel-body panel-default">
						{{ substr($post->content, 0, 100) }}...
						<a href="/posts/{{ $post->id }}">Read More</a>
					</div>
					<div class="panel-footer clearfix">
						<a href="#" id="like-count-{{$post->id}}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_{{$post->id}}" >
							{{ $post->likes->count() }} like(s)
						</a>
						<a href="javascript:void(0)" data-pg="{{ $post->id }}" class="like-post pull-right">
							Favorite
						</a>
					</div>
				</div>

				  <!-- Modal -->
				  <div class="modal fade" id="myModal_{{$post->id}}" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Likers</h4>
				        </div>
				        <div class="modal-body">
				          <p>
				          	@forelse($post->likes as $like)
				          		<div>
				          			<a href="/profile/{{ $like->liker->username }}">{{ $like->liker->name }}</a>
				          		</div>
				          	@empty
				          		no likes
				          	@endforelse
				          </p>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>
			</div>
		@empty
			No results found
		@endforelse
		<div class="col-md-6 col-md-offset-3">
				{{ $posts->links() }}
			</div>
	</div>	
@endsection