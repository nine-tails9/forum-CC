@extends('layouts.app')


@section('content')

	<div class="container">
		
		<div class="row">
			<h3>Type Your Question</h3>

			<div class="col col-md-7">
			<form action="/updateQues/{{ $data[0]->id }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="Title">Title</label>

			    	<input class="form-control"  type = "text" name = "Qtitle" value = "{{$data[0]->title }}" rows="3"></input>
			  	</div>

				<div class="form-group">
					<label for="Question">Question</label>
			  	<input class="form-control" name = "Qbody" value = "{{$data[0]->body}}" rows="3"></input>
			  </div>
				<tags></tags>
				<button type="submit" class="btn btn-primary">Submit</button>

			</form>
			</div>
			<div class="row">@include('err')</div>
		</div>
	</div>
@endsection