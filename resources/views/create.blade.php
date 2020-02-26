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
<form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data">
	
@csrf
<label>Name</label>
<input class="form-control" type="text" name="name">
<br>
<label>Age</label>
<input class="form-control"  type="text" name="age">
<br>
<input type="submit" name="add" value="ADD" class="btn btn-primary">

</form>

@endsection