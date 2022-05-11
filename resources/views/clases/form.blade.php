@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">
          
            {{ method_field('PATCH') }}
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <label for="id-teacher" class="form-label"> Selecciona el profesor:</label>
                        <select name="id_teacher" id="id-teacher">
                         @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if (isset($selectedTeacher)) @selected($selectedTeacher->id ==
                             $teacher->id) @endif> {{ $teacher->id. ' ' .$teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <label for="id-course" class="form-label"> Selecciona el curso:</label>
                        <select name="id_course" id="id-course">
                         @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @if (isset($selectedCourse)) @selected($selectedCourse->id ==
                             $course->id) @endif> {{ $course->id. ' '.$course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <label for="id-teacher" class="form-label"> Selecciona el horario:</label>
                        <select name="id_schedule" id="id-schedule">
                         @foreach ($schedule as $schedule)
                            <option value="{{ $schedule->id }}" @if (isset($selectedSchedule)) @selected($selectedSchedule->id ==
                             $schedule->id) @endif> {{ $schedule->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                 
                    <ul class="list-group list-group-flush">
                        <label for="name" class="form-label"> Nombre </label>
                        <input type="text" name="name" value="{{ $clases->name }}" id="name">
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="color" class="form-label"> Color </label>
                        <input type="text" name="color" value="{{ $clases->color }}" id="color">
                    </ul>
                </div>
            </div>

            <div class="row  mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos">
            </div>
        </form>
</div>
</div>