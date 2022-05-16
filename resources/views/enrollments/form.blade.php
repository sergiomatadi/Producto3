@extends('layouts.base')

<div class="container d-flex justify-content-center align-items-center h-100">
    <section class="login d-flex flex-column justify-content-center align-items-center rounded-3 bg-white w-50 P-5">
        <form class="align-items-center justify-content-center">
            @csrf
            <input type="hidden" name="id_student" id="id_student" value="{{ $student->id}}" />
            <label for="id-course" class="form-label"> Selecciona el curso:</label>
            <select name="id_course" id="id-course">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" @if (isset($selectedCourse)) @selected($selectedCourse->id ==
                    $course->id) @endif>
                    {{ $course->name }}
                </option>
                @endforeach
            </select>
                <div class="row  mb-3">
                    <div class="" style="width: 18rem">
                        <ul class="list-group list-group-flush">
                            <label for="status" class="form-label"> Confirma: </label>
                            <input type="checkbox" name="status" class="switch-input" value="1" {{ isset($enrollments)
                                && $enrollments->status ? 'checked="checked"' : '' }}/>
                        </ul>
                        <div class="col mt-4 mb-3">
                            <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Te has inscrito correctamente')">Confirmar</button>
                        </div>
                    </div>
                </div>

            </select>
        </form>
</div>
</div>
</div>