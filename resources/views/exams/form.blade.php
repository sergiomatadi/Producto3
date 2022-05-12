@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">
            <div class="row align-items-center mt-3 ">
                <div class="" style="width: 18rem">            
                    <label for="id-class" class="form-label"> Selecciona la clase: </label>
                    <select name="id_class" id="id-class">
                        @foreach ($clases as $clase)
                            <option value="{{ $clase->id }}"
                            @if (isset($selectedClase)) @selected($selectedClase->id == $clase->id) @endif>
                                {{ $clase->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3 ">
                <div class="" style="width: 18rem">  
                    <label for="id-student" class="form-label "> Selecciona al estudiante:</label>
                    <select name="id_student" id="id-student">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                @if (isset($selectedStudent)) @selected($selectedStudent->id == $student->id) @endif>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="name" class="form-label"> Nombre: </label>
                        <input type="text" name="name" id="name" value="{{ $exams->name ?? '' }}"  />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="mark" class="form-label"> Nota: </label>
                        <input type="mark" name="mark" id="mark" value="{{ $exams->mark ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="col mt-3 mb-3 ">
                <input type="submit" class="btn btn-primary" value="Guardar datos" />
            </div>
        </form>
</div>
</div>
