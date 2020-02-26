@extends('parent')

@section('main')

<a class="btn btn-danger" href="{{ route('crud.index')}}">BACK</a>

<h3>NAME: {{ $data->name }}</h3><br>
<h3>AGE: {{ $data->age }}</h3><br>


@endsection