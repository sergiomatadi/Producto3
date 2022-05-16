@extends('adminlte::page')
@section ('title', 'Cursos')
@section ('content_header')
<h1>Cursos</h1>
@stop

@section ('content')
@can('admin.users.index')
<a href="courses/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<a href="{{ url('enrollments/create') }}">
    @csrf
        
        <button type="submit" class="btn btn-danger mt-4"onclick="return confirm('¿Quieres incribirte?')"> Inscripción</button>

        </a>
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de finalización</th>
            <th scope="col">Activo</th>
            <th colspan="3" scope="col">Acciones</th>
        <tr>
    </thead>
    <tbody>
    @foreach( $courses as $course )
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->date_start }}</td>
            <td>{{ $course->date_end }}</td>
            <td>{{ $course->active }}</td>
            <td width="10px">
               
            <td width="10px">
                @can('courses.index.edit', $course)
                <a href="{{ url('/courses/'.$course->id.'/edit') }}"class="btn btn-warning btn-sm">Editar
                </a>
            </td>
            <td width="10px">
                <form action="{{ url('/courses/'.$course->id ) }}" method="post">
                @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('¿Quieres eliminar?')"> Borrar</button>
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop

@section ('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section ('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop
