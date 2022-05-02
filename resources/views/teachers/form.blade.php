@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">

            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="name"> Nombre </label>
                        <input type="text" name="name" id="name" value="{{ $teachers->name ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="surname" class="form-label"> Apellido </label>
                        <input type="text" name="surname" id="surname" value="{{ $teachers->surname ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="telephone" class="form-label"> Teléfono </label>
                        <input type="text" name="telephone" id="telephone" value="{{ $teachers->telephone ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="nif" class="form-label"> NIF </label>
                        <input type="text" name="nif" id="nif" value="{{ $teachers->nif ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="email" class="form-label"> Email </label>
                        <input type="text" name="email" id="email" value="{{ $teachers->email ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="col mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos" />
            </div>
        </form>
</div>
</div>