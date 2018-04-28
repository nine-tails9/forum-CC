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

				<small>Votes : {{ $q->upvotes }}</small>
			</div>

		@endforeach
		</ul>
	</div>


@endsection