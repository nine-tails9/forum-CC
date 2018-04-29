@extends('layouts.app')


@section('content')

	<div class="container">
		
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
		</div>
	</div>
@endsection