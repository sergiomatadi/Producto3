@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/teachers') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('teachers.form')

</form>
</div>
@endsection
