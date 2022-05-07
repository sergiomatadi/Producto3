@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/subjects') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('subjects.form')

</form>
</div>
@endsection
