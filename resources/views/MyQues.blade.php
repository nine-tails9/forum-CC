@extends('layouts.app')



@section('content')


	<div class="container">
		<div class="row">
			@foreach($data as $i)
				

				<div class="panel panel-default">
				  <div class="panel-heading">
				  	{{ $i->title }}
				  	@if(auth()->user()->admin != 2)
				  		<div class="pull-right"><a href="/editQ/{{$i->id}}">Edit</a></div>
				  	@endif
				  </div>
				  <div class="panel-body">
				    {{ $i->body }}

				  <small><div class="pull-right">{{ $i->created_at->diffForHumans() }}</div></small>
				  </div>

				</div>

			@endforeach

		</div>

	</div>








@endsection