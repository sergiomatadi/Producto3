@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Inscripciones</h1>
@stop

@section ('content')
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Alumno</th>
            <th scope="col">Curso</th>
            <th scope="col">Estado</th>
            <th colspan="3" scope="col">Acciones</th>
        <tr>
    </thead>
    <tbody>
        @foreach( $enrollments as $enrollment )
        <tr>
            <td>{{ $enrollment->id }}</td>
            <td>{{ $enrollment->student }}</td>
            <td>{{ $enrollment->course }}</td>
            <td>{{ $enrollment->status }}</td>
            <td width="10px">
                @can('admin.user.index')
                <a href="{{ url('/enrollments/'.$enrollment->id.'/edit') }}" class="btn btn-warning btn-sm">Editar
                </a>
                <td width="10px">
                <form action="{{ url('/enrollments/'.$enrollment->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('¿Quieres eliminar?')"> Borrar</button>
                </form>   
                @endcan       
            @endforeach
            </td>
        </tr>            

    </tbody>
</table>
@stop

@section ('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section ('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop