@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/works') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('works.form')

</form>
</div>
@endsection