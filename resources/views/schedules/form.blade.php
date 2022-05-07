@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">

            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="day"> Día </label>
                        <input type="date" name="day" id="day" value="{{ $schedules->day ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="time_start" class="form-label"> Fecha inicio </label>
                        <input type="time" name="time_start" id="time_start" value="{{ $schedules->time_start ?? '' }}" />
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="" style="width: 18rem">
                    <ul class="list-group list-group-flush">
                        <label for="time_end" class="form-label"> Fecha fin </label>
                        <input type="time" name="time_end" id="time_end" value="{{ $schedules->time_end ?? '' }}" />
                    </ul>
                </div>
            </div>
            <label for="id_subject" class="form-label"> Asignatura </label>
            <select name="id_subject" id="id_subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                    @if (isset($selectedSubject)) @selected($selectedSubject->id == $subject->id) @endif>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>

            <div class="col mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar datos" />
            </div>
        </form>
</div>
</div>
