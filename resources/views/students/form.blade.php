@extends('layouts.base')

@section('content')
<div class="mb-3">
<label for="username"> Usuario </label>
<input type="text" name="username" value="{{ $students->username}}" id="username" >
<br>
<div class="mb-3">
<label for="pass"> Contraseña </label>
<input type="text" name="pass" value="{{ $students->pass}}"id="pass">
<br>
<div class="mb-3">
<label for="email"> Email </label>
<input type="text" name="email" value="{{ $students->email}}" id="email">
<br>
<div class="mb-3">
<label for="name"> Nombre </label>
<input type="text" name="name" value="{{ $students->name}}"id="name" >
<br>
<div class="mb-3">
<label for="telephone"> Teléfono </label>
<input type="text" name="telephone" value="{{ $students->telephone}}" id="telephone">
<br>
<div class="mb-3">
<label for="nif"> NIF </label>
<input type="text" name="nif" value="{{ $students->nif}}" id="nif" >
<br>
<div class="mb-3">
<label for="date_registered"> Fecha de registro </label>
<input type="text" name="date_registered" value="{{ $students->date_registered}}" id="date_registered">
<br>
<div class="mb-3">
<input type="submit" value="Guardar datos" >
</div
@endsection