@extends('layouts.app')


@section('content')

	<div class="container">
		@if(auth()->user()->admin == 2)
			<div class="row">
				<div class="col">
					<h4>Sorry You are suspended..Contact Admin</h4>
				</div>
			</div>
		@else
		<div class="row">
			<h3>Type Your Question</h3>

			<div class="col col-md-7">
			<form action="/create" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="Title">Title</label>
			    	<input class="form-control"  type = "text" name = "Qtitle" rows="3"></input>
			  	</div>

				<div class="form-group">
					<label for="Question">Question</label>
			  	<textarea class="form-control" name = "Qbody" rows="3"></textarea> 
			  </div>
				<tags></tags>
				<button type="submit" class="btn btn-primary">Submit</button>

			</form>
			</div>
			<div class="row">@include('err')</div>
		</div>
		@endif
	</div>
@endsection