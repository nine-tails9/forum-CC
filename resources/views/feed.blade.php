@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<form class="form-inline" action="/search" method="get">
					{{ csrf_field() }}
				<div class="form-group">
					<input type="text" class="form-control" name="tag" placeholder="Search for Tag">
				</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>
			
			</div><!-- /.row -->
		</div>
		<ul class="list-group">
		@foreach($question as $q)
			
			<div class="list-group-item">
				
				<a href="forum/{{ $q->id }}">{{ $q->title }}
				</a>
				<div class="pull-right">
				<small>
					Posted By: {{ $q->user->name }}
				</small>
				</div>
				</p>
				@foreach($q->tags as $tag)
				<h4><span class="label label-default pull-right" style="margin:5px;">{{$tag->Tag_name}}
                </h4>
                @endforeach

				<small class="text-success">Upvotes : {{ $q->upvotes }}</small>

				<small class="text-danger">Downvotes : {{ $q->downvotes }}</small>

			</div>

		@endforeach
		</ul>
	</div>


@endsection