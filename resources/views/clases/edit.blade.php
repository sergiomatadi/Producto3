@extends('layouts.base')

@section('content')
<form action="{{ url('/clases/'.$clases->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('clases.form');
</form>

@endsection
