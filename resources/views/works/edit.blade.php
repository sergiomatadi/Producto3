@extends('layouts.base')

@section('content')
<form action="{{ url('/works/'.$works->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('works.form');
</form>

@endsection