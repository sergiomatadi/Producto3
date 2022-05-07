@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">

            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="name"> Nombre </label>
                        <input type="text" name="name" id="name" value="{{ $subjects->name ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="color" class="form-label"> Color </label>
                        <input type="text" name="color" id="color" value="{{ $subjects->color ?? '' }}" />
                    </ul>
                </div>
            </div>
            <label for="id-course" class="form-label"> Curso </label>
            <select name="id_course" id="id-course">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                    @if (isset($selectedCourse)) @selected($selectedCourse->id == $course->id) @endif>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>

            <label for="id-teacher" class="form-label"> Profesor </label>
            <select name="id_teacher" id="id-teacher">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}"
                        @if (isset($selectedTeacher)) @selected($selectedTeacher->id == $teacher->id) @endif>
                        {{ $teacher->name . ' ' . $teacher->surname }}
                    </option>
                @endforeach
            </select>
            <div class="col mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos" />
            </div>
        </form>
</div>
</div>
