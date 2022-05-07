
@extends('layouts.base')

@section('content')
<form action="{{ url('/schedules/'.$schedules->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('schedules.form');
</form>

@endsection



