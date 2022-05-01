@extends('layouts.base')


<div class="row align-items-center mb-3">
    <label for="name" class="form-label"> Nombre </label>
    <input type="text" name="name" value="{{ $courses->name ?? ''}}" id="name" >
<br>
<div class="row align-items-center mb-3">
    <label for="description" class="form-label"> Descripción </label>
    <input type="text" name="description" value="{{ $courses->description ?? ''}}"id="description">
<br>
<div class="row align-items-center mb-3">
    <label for="date-start" class="form-label"> Fecha de inicio </label>
    <input type="date" name="date_start" value="{{ isset($courses) ? $courses->date_start->format('Y-m-d') : ''}}" id="date_start">
<br>
<div class="row align-items-center mb-3">
    <label for="date_end" class="form-label"> Fecha de finalización </label>
    <input type="date" name="date_end" value="{{ isset($courses) ? $courses->date_end->format('Y-m-d') : ''}}"id="date_end" >
<br>
<div class="row align-items-center mb-3">
    <label for="active" class="form-label"> Activo </label>
    <input type="checkbox" name="active" class="switch-input" value="1" {{ isset($courses) && $courses->active ? 'checked="checked"' : '' }}/>
<br>
<div class="row align-items-center mb-3">
    <input type="submit" class="btn btn-primary" value="Guardar datos" >
</div
