@extends('layouts.app')


@section('content')

<div class="container">

	@if(!$info)
	<h2>No Pending Posts</h2>
	@endif
	<table class="table table-hover">
		<tr>
			
			<th>From</th>
			<th>Approve</th>

			<th>Discard</th>
		</tr>
	@foreach($info as $x)
		<tr>
			<td>{{$x->name}}
			</td>
			<td style="width: 10%;">
				<form action="/approve/{{ $x->id }}" method="post">
					{{ csrf_field()}}
					<button type="submit" class="btn btn-success btn-sm">Approve</button>
				</form>
			</td>
			<td>
				<form action="/discard/{{ $x->id }}" method="post">
					{{ csrf_field()}}
					<button type="submit" class="btn btn-danger btn-sm">Discard</button>
				</form>
			</td>
		</tr>
	
	@endforeach
	</table>
</div>





@endsection