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
			  <div class="pull-right">{{$info[0]->user->name }}</div>
			  <votes v-bind:cnt = "{{$i->upvotes}}" v-bind:id = "{{ $info[0]->user->id }}" v-bind:user = "{{auth()->user()->id }}" v-bind:qid = "{{ $i->id }}"></votes>
			</div>

		@endforeach

	</div>

	<div class="row">
		
		<h4>Have an Answer?</h4>
			<div class="col col-md-7">
				<form action="/forum/answer/{{ $info[0]->id }}" method="post">
					{{ csrf_field() }}


				<div class="form-group">
					<label for="Question">Answer</label>
			    <textarea class="form-control" name = "Abody" rows="3"></textarea>
			  </div>

				<button type="submit" class="btn btn-primary">Post</button>

			</form>
			</div>
	</div>
	<hr>
	<div class="row" style="margin: 10px;">
		<div class="col col-md-7">
		
			@foreach($info as $i)

				@foreach($i->answers as $x)
				<div class="panel panel-default">
				  <div class="panel-heading">
				  	{{ $x->body }}
				  	
				  </div>
				  <div class="panel-footer pull-right">
				  	<small>Posted by: {{ $x->user->name}}</small></div>
				 </div>
				  <div class="row">
					  
					  	<div class="col" style="margin-left: 10%;">
							<h6>Comments</h6>
							@foreach($x->comments as $com)
							<div class="panel panel-default">
					  			<div class="panel-body">{{ $com->body }}</div>

					  			<small class="pull-right">{{ $com->user->name }}</small>
					  		</div>
					  		@endforeach
					  		<form action="/forum/comment/{{ $x->id }}" method="post">
					  			{{csrf_field()}}
					  			<div class="form-group">
							    <input class="form-control" name = "Cbody" rows="3" placeholder="Type a Comment"></input>
							    <button type="submit" class="btn btn-xs btn-success">Comment</button>
							  </div>
					  		</form>


					  </div>
				  </div>
				<hr>
				@endforeach
			@endforeach
		
		</div>
	</div>

</div>




@endsection