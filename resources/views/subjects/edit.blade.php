
@extends('layouts.base')

@section('content')
<form action="{{ url('/subjects/'.$subjects->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('subjects.form');
</form>

@endsection



