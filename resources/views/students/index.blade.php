@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Estudiantes</h1>
@stop

@section ('content')
@can('admin.users.index')
<a href="students/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">NIF</th>
            <th scope="col">Fecha de registro</th>
            <th colspan="3" scope="col">Acciones</th>
        <tr>
    </thead>
    <tbody>
    @foreach( $students as $students )
        <tr>
            <td>{{ $students->id }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->username }}</td>
            <td>{{ $students->email }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->telephone }}</td>
            <td>{{ $students->nif }}</td>
            <td>{{ $students->date_registered }}</td>
            <td width="10px">      
                @can('admin.users.index')      
                <a href="{{ url('/students/'.$students->id.'/edit') }}"class="btn btn-warning btn-sm">Editar        
                </a>
            </td>
            <td width="10px">
                <form action="{{ url('/students/'.$students->id ) }}" method="post">
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