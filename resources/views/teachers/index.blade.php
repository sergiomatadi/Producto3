@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Profesores</h1>
@stop

@section ('content')
@can('teachers.index.create')    
<a href="teachers/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">NIF</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
            <th scope="col"></th>
        <tr>
    </thead>
    <tbody>
    @foreach( $teachers as $teacher )
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->surname }}</td>
            <td>{{ $teacher->telephone }}</td>
            <td>{{ $teacher->nif }}</td>
            <td>{{ $teacher->email }}</td>
            <td width="10px">
                @can('teachers.index.create', $teacher)
                <a href="{{ url('/teachers/'.$teacher->id.'/edit') }}" class="btn btn-warning btn-sm">Editar
                </a>
            </td>

            <td width="10px">
                <form action="{{ url('/teachers/'.$teacher->id ) }}"        method="post">
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
