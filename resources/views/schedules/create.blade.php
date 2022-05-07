@extends('layouts.base')

@section('content')
<div class="row mt-4 align-items-center justify-center">
<form action="{{ url('/schedules') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('schedules.form')

</form>
</div>
@endsection
