@extends('adminlte::page')
@section ('title', 'Trabajos')
@section ('content_header')
<h1>Trabajos</h1>
@stop

@section ('content')
@can('admin.users.index')
<a href="works/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Clase</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Nombre</th>
            <th scope="col">Notas</th>
            <th colspan="3" scope="col">Acciones</th>
        <tr>
    </thead>
    <tbody>
        @foreach( $works as $work )
        <tr>
            <td>{{ $work->id }}</td>
            <td>{{ $work->clase }}</td>
            <td>{{ $work->student }}</td>
            <td>{{ $work->name}}</td>
            <td>{{ $work->mark }}</td>
            <td width="10px">
            <a href="{{ url('/works/'.$work->id.'/edit') }}"class="btn btn-warning btn-sm">Editar
            </a>
            <td width="10px">
            <form action="{{ url('/works/'.$work->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('¿Quieres eliminar?')"> Borrar</button>
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
