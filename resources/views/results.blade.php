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
		@if(!count($data))
		<div class="row">
			<div class="col col-lg-6">
			<h2>Sorry No Results found</h2>
		</div>	
		</div>
		@endif
		@foreach($data as $q)
			<div class="list-group-item">
				
				<a href="forum/{{ $q->id }}">{{ $q->title }}
				</a>
				<div class="pull-right">
				<small>
					Posted By: {{ $q->user->name }}
				</small>
				</div>
				</p>
				<small class="text-success">Upvotes : {{ $q->upvotes }}</small>

				<small class="text-danger">Downvotes : {{ $q->downvotes }}</small>

			</div>

		@endforeach

		</div>





@endsection