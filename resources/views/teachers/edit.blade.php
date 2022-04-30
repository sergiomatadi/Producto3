
@extends('layouts.base')

@section('content')
<form action="{{ url('/teachers/'.$teachers->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('teachers.form');
</form>

@endsection



