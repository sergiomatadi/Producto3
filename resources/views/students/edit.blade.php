
@extends('layouts.base')

@section('content')
<form action="{{ url('/students/'.$students->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('students.form');

</form>

@endsection



