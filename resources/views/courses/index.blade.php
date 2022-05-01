@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Dashboard</h1>
@stop

@section ('content')
<a href="courses/create" class="btn btn-primary mt-4">CREAR</a>
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de finalización</th>
            <th scope="col">Activo</th>
            <th scope="col">Acciones</th>


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
            <td>

            <a href="{{ url('/courses/'.$course->id.'/edit') }}"class="text-decoration-none mt-1"><input type="submit" style="text-decoration:none" value="Editar">

            </a>


            <form action="{{ url('/courses/'.$course->id ) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="mt-3"onclick="return confirm('¿Quieres eliminar?')" value="Borrar">
            </form>

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
