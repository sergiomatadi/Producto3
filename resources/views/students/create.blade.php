@extends('layouts.base')


<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
<form action="{{ url('/students') }}" method="post" enctype="multipart/form-data" >
@csrf
<div class="row align-items-center mb-3">
    <label for="username"> Usuario </label>
    <input type="text" name="username" id="username" >
</div>
<div class="row align-items-center mb-3">
    <label for="pass"class="form-label"> Contraseña </label>
    <input type="text" name="pass" id="pass">
</div>
<div class="row align-items-center mb-3">
    <label for="email" class="form-label" > Email </label>
    <input type="text" name="email" id="email">
</div>
<div class="row align-items-center mb-3">
    <label for="name" class="form-label"> Nombre </label>
    <input type="text" name="name" id="name" >
</div>
<div class="row align-items-center mb-3">
    <label for="telephone" class="form-label"> Teléfono </label>
    <input type="text" name="telephone" id="telephone">
</div>
<div class="row align-items-center mb-3">
    <label for="nif" class="form-label"> NIF </label>
    <input type="text" name="nif" id="nif" >
</div>
<div class="col align-items-center mb-3">
    <label for="date_registered" class="form-label"> Fecha de registro </label>
    <input type="date" name="date_registered" id="date_registered">
</div>
<div class="col mb-3">
<input type="submit" class="btn btn-primary" value="Guardar datos" >
</div>
</form>
</div>