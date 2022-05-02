@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="name" class="form-label"> Nombre </label>
                        <input type="text" name="name" value="{{ $courses->name ?? ''}}" id="name">
                    </ul>
                </div>
            </div>

            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="description" class="form-label"> Descripción </label>
                        <input type="text" name="description" value="{{ $courses->description ?? ''}}" id="description">
                    </ul>
                </div>
            </div>
            <div class="row  mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="date-start" class="form-label"> Fecha de inicio </label>
                        <input type="date" name="date_start"
                            value="{{ isset($courses) ? $courses->date_start->format('Y-m-d') : ''}}" id="date_start">
                    </ul>
                </div>
            </div>
            <div class="row  mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="date_end" class="form-label"> Fecha de finalización </label>
                        <input type="date" name="date_end"
                            value="{{ isset($courses) ? $courses->date_end->format('Y-m-d') : ''}}" id="date_end">
                    </ul>
                </div>
            </div>
            <div class="row  mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="active" class="form-label"> Activo </label>
                        <input type="checkbox" name="active" class="switch-input" value="1" {{ isset($courses) &&
                            $courses->active ? 'checked="checked"' : '' }}/>
                    </ul>
                </div>
            </div>
            <div class="row  mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos">
            </div>
        </form>
</div>
</div>