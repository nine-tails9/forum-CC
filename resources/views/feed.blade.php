@extends('layouts.app')
@section('content')

	<div class="container">
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