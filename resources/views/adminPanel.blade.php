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
		</tr>
	@foreach($info as $x)
		<tr>
			<td>{{$x->name}}
			</td>
			<td style="width: 10%;">
				<form action="/makeAdmin/{{ $x->id }}" method="post">
					{{ csrf_field()}}
					<button type="submit" class="btn btn-success btn-sm">Approve</button>
				</form>
			</td>
		</tr>
	
	@endforeach
	</table>
</div>





@endsection