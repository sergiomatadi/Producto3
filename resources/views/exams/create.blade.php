@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/exams') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('exams.form')

</form>
</div>
@endsection