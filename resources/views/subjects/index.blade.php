@extends('adminlte::page')
@section ('title', 'Asignaturas')
@section ('content_header')
<h1>Asignaturas</h1>
@stop

@section ('content')
@can('admin.users.index')
<a href="subjects/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Color</th>
            <th scope="col">Curso</th>
            <th scope="col">Profesor</th>
            <th colspan="3" scope="col">Acciones</th>
        <tr>
    </thead>
    <tbody>
    @foreach( $subjects as $subject )
        <tr>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->color }}</td>
            <td>{{ $subject->course }}</td>
            <td>{{ $subject->teacher }}</td>
            <td width="10px">
            <a href="{{ url('/subjects/'.$subject->id.'/edit') }}"class="btn btn-warning btn-sm">Editar
            </a>
            <td width="10px">
            <form action="{{ url('/subjects/'.$subject->id ) }}" method="post">
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
