@extends('parent')

@section('main')

<a class="btn btn-success" href="{{ route('crud.create') }}">ADD</a>


@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
@if($message = Session::get('delete'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<tr>
		<th>Name</th>
		<th>Age</th>
		<th>Action</th>
	</tr>
	@foreach($data as $row)
	<tr>
	<td>{{ $row->name }}</td>
	<td>{{ $row->age }}</td>
	<td>
		<a class="btn btn-primary" href="{{ route('crud.show',$row->id)}}">SHOW</a>
		<a class="btn btn-success" href="{{ route('crud.edit',$row->id)}}">UPDATE</a>
		<form action="{{ route('crud.destroy',$row->id)}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-danger">DELETE</button>
		</form>
	</td>
    </tr>
	@endforeach
</table>
</div>
{!! $data->links() !!}

@endsection