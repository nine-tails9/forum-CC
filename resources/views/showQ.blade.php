@extends('layouts.app')


@section('content')

	<div class="container">
	<div class="row">
		@foreach($info as $i)
			

			<div class="panel panel-default">
			  <div class="panel-heading">
			  	{{ $i->title }}
			  </div>
			  <div class="panel-body">
			    {{ $i->body }}
			  </div>
			</div>

		@endforeach

	</div>

	<div class="row">
		
		<h4>Have an Answer?</h4>
			<div class="col col-md-7">
				<form action="/forum/{{ $info[0]->id }}" method="post">
					{{ csrf_field() }}


				<div class="form-group">
					<label for="Question">Answer</label>
			    <textarea class="form-control" name = "Qbody" rows="3"></textarea>
			  </div>

				<button type="submit" class="btn btn-primary">Post</button>

			</form>
			</div>
	</div>
	</div>




@endsection