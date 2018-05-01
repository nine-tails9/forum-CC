@extends('layouts.app')


@section('content')

<div class="container">

	@if(!$info)
	<h2>No users found</h2>
	@endif
	<table class="table table-hover">
		<tr>
			
			<th>User</th>
			<th>Approve</th>
			<th>Action</th>

		</tr>
	@foreach($info as $x)
		<tr>
			<td>{{$x->name}}
			</td>
			<td>
				<form action="/makeAdmin/{{ $x->id }}" method="post">
					{{ csrf_field()}}
					<button type="submit" class="btn btn-success btn-sm">Approve</button>
				</form>
			</td>
			@if($x->admin != 2){
			<td>
				<form action="/suspend/{{ $x->id }}" method="post">
					{{ csrf_field()}}
					<button type="submit" class="btn btn-warning btn-sm">Suspend</button>
				</form>
			</td>
			@else
				<td>
					<form action="/active/{{ $x->id }}" method="post">
						{{ csrf_field()}}
						<button type="submit" class="btn btn-info btn-sm">Active</button>
					</form>
				</td>
			@endif
			<td>
				<form action="/bonus/{{ $x->id }}" class="inline-form" method="post">
					{{ csrf_field()}}
					<div class="form-group">
						<input type="text" style = "width: 20%;" class="form-control" name="bonus" placeholder="Give Bonus">
					</div>
					<button type="submit" class="btn btn-warning btn-sm">Go</button>
				</form>
			</td>
		</tr>


	@endforeach
	</table>
	@if(Session::has('message'))
		<p class="alert alert-info pull-right animated lightSpeedIn" style="width: 20%;">{{ Session::get('message') }}</p>
	@endif
</div>





@endsection