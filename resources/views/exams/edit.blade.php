@extends('layouts.base')

@section('content')
<form action="{{ url('/exams/'.$exams->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('exams.form');
</form>

@endsection