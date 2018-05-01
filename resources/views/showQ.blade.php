@extends('layouts.app')


@section('content')

	<div class="container">
	<div class="row">
		@foreach($info as $i)
			
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	{{ $i->title }}
			  	@if(auth()->user()->admin == 1 || ( auth()->user()->admin != 2 && $i->user->id == auth()->user()->id))
			  	<div class="pull-right"><a href="/editQ/{{$i->id}}">Edit</a></div>
			  	@endif
			  </div>
			  <div class="panel-body">
			    {{ $i->body }}

			  @foreach($i->tags as $tag)
				<h4><span class="label label-default pull-right" style="margin:5px;">{{$tag->Tag_name}}
                </h4>
                @endforeach

			  <small><div class="pull-left">By: {{$info[0]->user->name }}</div></small>
			  </div>

			@if(auth()->user()->admin != 2)
			  <votes v-bind:upcnt = "{{$i->upvotes}}" v-bind:downcnt = "{{$i->downvotes}}" v-bind:id = "{{ $info[0]->user->id }}" v-bind:user = "{{auth()->user()->id }}" v-bind:qid = "{{ $i->id }}"></votes>
			  @endif
			</div>

		@endforeach

	</div>
	@if(auth()->user()->admin != 2)
	<div class="row">
		
		<h4>Have an Answer?</h4>
			<div class="col col-md-7">
				<form action="/forum/answer/{{ $info[0]->id }}" method="post">
					{{ csrf_field() }}


				<div class="form-group">
					<label for="Question">Answer</label>
			    <textarea class="form-control" name = "Abody" rows="3"></textarea>
			    <input type="hidden" name="user" value="{{ $info[0]->user->id}}">
			  </div>

				<button type="submit" class="btn btn-primary">Post</button>
				@include('err')
			</form>
			</div>
	</div>
	@endif

	@if(Session::has('message'))
		<p class="alert alert-info pull-right animated lightSpeedIn" style="width: 20%;">{{ Session::get('message') }}</p>
	@endif
	<hr>
	<div class="row" style="margin: 10px;">
		<div class="col col-md-7">
		
			@foreach($info as $i)

				@foreach($i->answers as $x)
				@if($x->status)
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

							@if(auth()->user()->admin != 2)
					  		<form action="/forum/comment/{{ $x->id }}" method="post">
					  			{{csrf_field()}}
					  			<div class="form-group">
							    <input class="form-control" name = "Cbody" rows="3" placeholder="Type a Comment"></input>
							    <button type="submit" class="btn btn-xs btn-success">Comment</button>
							  </div>
					  		</form>
					  		@endif


					  </div>
				  </div>
				<hr>
				@endif
				@endforeach
			@endforeach
		
		</div>
	</div>

</div>




@endsection