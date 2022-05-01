@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/courses') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('courses.form')

</form>
</div>
@endsection
