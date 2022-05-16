@extends('layouts.base')

@section('content')
<form action="{{ url('/enrollments/'.$enrollment->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('enrollments.form');
</form>

@endsection