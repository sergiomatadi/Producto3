@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="username"> Usuario </label>
                        <input type="text" name="username" value="{{ $students->username}}" id="username" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="pass"> Contraseña </label>
                        <input type="text" name="pass" value="{{ $students->pass}}" id="pass" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="email"> Email </label>
                        <input type="text" name="email" value="{{ $students->email}}" id="email" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="name"> Nombre </label>
                        <input type="text" name="name" value="{{ $students->name}}" id="name" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="telephone"> Teléfono </label>
                        <input type="text" name="telephone" value="{{ $students->telephone}}" id="telephone" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="nif"> NIF </label>
                        <input type="text" name="nif" value="{{ $students->nif}}" id="nif" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="date_registered"> Fecha de registro </label>
                        <input type="text" name="date_registered" value="{{ $students->date_registered}}"
                            id="date_registered" />
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos" />
            </div>
        </form>
</div>
</div>
