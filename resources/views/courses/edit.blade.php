
@extends('layouts.base')

@section('content')
<form action="{{ url('/courses/'.$courses->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('courses.form')

</form>

@endsection



