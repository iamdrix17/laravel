@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>

</div>
@endif

<a class="btn btn-danger" href="{{ route('crud.index')}}">BACK</a>

<form method="POST" action="{{ route('crud.update',$data->id) }}" enctype="multipart/form-data">
	
@csrf
@method('PATCH')
<label>Name</label>
<input class="form-control" type="text" name="name" value="{{ $data->name }}">
<br>
<label>Age</label>
<input class="form-control"  type="text" name="age" value="{{ $data->age }}">
<br>
<input type="submit" name="EDIT" value="SAVE" class="btn btn-primary">

</form>

@endsection