@extends('layouts.base')


<div class="row align-items-center mb-3">
    <label for="name"> Nombre </label>
    <input type="text" name="name" id="name" value="{{ $teachers->name ?? '' }}" />
</div>
<br>
<div class="row align-items-center mb-3">
    <label for="surname"class="form-label"> Apellido </label>
    <input type="text" name="surname" id="surname" value="{{ $teachers->surname ?? '' }}" />
</div>
<br>
<div class="row align-items-center mb-3">
    <label for="telephone" class="form-label" > Teléfono </label>
    <input type="text" name="telephone" id="telephone" value="{{ $teachers->telephone ?? '' }}" />
</div>
<br>
<div class="row align-items-center mb-3">
    <label for="nif" class="form-label"> NIF </label>
    <input type="text" name="nif" id="nif" value="{{ $teachers->nif ?? '' }}" />
</div>
<br>
<div class="row align-items-center mb-3">
    <label for="email" class="form-label"> Email </label>
    <input type="text" name="email" id="email" value="{{ $teachers->email ?? '' }}" />
</div>
<br>
<div class="col mb-3">
<input type="submit" class="btn btn-primary" value="Guardar datos" />
</div>
